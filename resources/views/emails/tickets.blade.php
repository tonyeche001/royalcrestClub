<div style="font-family:Arial, sans-serif; max-width:500px; margin:auto; padding:20px; border:1px solid #e2e8f0; border-radius:8px;">
    <h2 style="color:#1a202c;">{{$order->event->title}}</h2>
    <p>Hi {{$order->buyer_name}}, your payment was successful!</p>

    <h3 style="margin-top:20px;">Your Ticket(s):</h3>
    @foreach($order->tickets as $ticket)
    <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #cbd5e1; border-radius: 6px; text-align: center; background:#f8fafc;">
        <p style="margin:0 0 10px 0; font-size:16px;"><strong>{{$ticket->ticketType->name}}</strong></p>
        <p style="margin:0 0 15px 0; color:#64748b;">Code: <strong style="font-family:monospace; color:#0f172a;">{{$ticket->ticket_code}}</strong></p>
        <div style="display:inline-block; padding:10px; background:#fff; border:1px solid #e2e8f0; border-radius:4px;">
            {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($ticket->ticket_code) !!}
        </div>
    </div>
    @endforeach

    <p style="margin-top:25px; text-align:center;">
        <a href="{{url('/orders/' . $order->id . '/confirmation')}}"
        style="background:#000; color:#fff; padding:12px 20px; text-decoration:none; border-radius:6px; font-weight:bold; display:inline-block;">
            View Confirmation & QR Tickets Online
        </a>
    </p>
</div>