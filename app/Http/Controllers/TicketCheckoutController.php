<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\TicketType;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class TicketCheckoutController extends Controller
{
    public function checkout(Request $request, Event $event)
    {
        $validated = $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'quantity' => 'required|integer|min:1|max:10',
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email',
            'buyer_phone' => 'required|string|max:20',
        ]);
        $ticketType = TicketType::findOrFail($validated['ticket_type_id']);
        $remaining = $ticketType->quantity - $ticketType->tickets()->count();
        if($validated['quantity'] > $remaining) {
            return back()->withErrors(['quantity' => 'Only ' . $remaining . ' tickets left for this type.']);
        }
        $totalAmount = $ticketType->price * $validated['quantity'];
        $reference = 'RCC' . strtoupper(uniqid());

        $order = Order::create([
            'event_id' => $event->id,
            'buyer_name' => $validated['buyer_name'],
            'buyer_email' => $validated['buyer_email'],
            'buyer_phone' => $validated['buyer_phone'],
            'total_amount' => $totalAmount,
            'reference' => $reference,
            'status' => 'pending',
        ]);
        session([
            'pending_order_id' => $order->id,
            'pending_ticket_type_id' => $ticketType->id,
            'pending_quantity' => $validated['quantity'],
        ]);
        request()->merge([
            'email' => $validated['buyer_email'],
            'amount' => $totalAmount * 100,
            'reference' => $reference,
            'callback_url' => route('tickets.callback'),
        ]);
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function callback()
    {
        $paystackData = Paystack::getPaymentData();
        
        $status = $paystackData['data']['status'] ?? $paystackData['status'] ?? null;
        $reference = $paystackData['data']['reference'] ?? $paystackData['reference'] ?? null;
        $order = Order::where('reference', $reference)->first();

        if(!$order) {
            return redirect('/events')->with('error', 'Order not found.');
        }
        if($status !== 'success') {
            $order->update(['status' => 'failed']);
            return redirect()->route('events.show', $order->event_id)->with('error', 'Payment was not successful.');
        }

        if ($order->status !== 'paid') {
            $order->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            $ticketTypeId = session('pending_ticket_type_id');
            $quantity = session('pending_quantity', 1);

            $tickets = [];
            if ($ticketTypeId && $quantity) {
                for($i = 0; $i < $quantity; $i++) {
                    $tickets[] = $order->tickets()->create([
                        'ticket_type_id' => $ticketTypeId,
                        'ticket_code' => strtoupper(uniqid('TCK')),
                    ]);
                }
            }

            try {
                Mail::to($order->buyer_email)->send(new \App\Mail\TicketConfirmationMail($order->fresh(['event', 'tickets.ticketType'])));
            } catch (\Throwable $e) {
                Log::error('Ticket email failed: ' . $e->getMessage());
            }

            session()->forget(['pending_order_id', 'pending_ticket_type_id', 'pending_quantity']);
        }

        return redirect()->route('tickets.confirmation', $order);
    }

    public function confirmation(Order $order)
    {
        $order->load('tickets.ticketType', 'event');
        return view('tickets.confirmation', compact('order'));
    }
}
