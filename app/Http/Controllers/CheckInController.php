<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        return view('admin.checkin');
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' =>'required|string'
        ]);
        $ticket = Ticket::with('ticketType', 'order')
        ->where('ticket_code', strtoupper(trim($request->code)))
        ->first();

        if($ticket->is_checked_in) {
            return back()->with('result',[
                'error',
                'Already used at'. optional($ticket->checked_in_at)->format('g:i A'),
            ]);
        }
        $ticket->update([
            'is_checked_in' => true,
            'checed_in_at' => now(),
        ]);
        return back()->with('result', [
            'success',
            $ticket->ticketType->name . '-' . $ticket->order->buyer_name,
        ]);
    }
}
