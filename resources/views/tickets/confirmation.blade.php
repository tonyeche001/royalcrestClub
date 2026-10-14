<x-public-layout>
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="dark-glass-card border border-emerald-500/40 text-emerald-300 p-6 rounded-2xl mb-8 shadow-xl">
                <div class="flex items-center space-x-3 mb-2">
                    <span class="text-2xl">🎉</span>
                    <h3 class="font-serif-heading text-xl font-bold text-white tracking-wide">PAYMENT SUCCESSFUL & ORDER CONFIRMED</h3>
                </div>
                <p class="text-xs text-slate-300 font-light leading-relaxed">Your order has been verified. Digital pass details and QR entry codes have been issued to <strong class="text-white">{{ $order->buyer_email }}</strong>.</p>
            </div>

            <div class="dark-glass-card rounded-2xl p-6 sm:p-8 mb-8 border border-white/10">
                <h3 class="font-serif-heading text-2xl font-bold text-white mb-2 tracking-wide">{{ $order->event->title }}</h3>
                <p class="text-xs text-slate-400 font-light">Buyer: <span class="font-semibold text-white">{{ $order->buyer_name }}</span> ({{ $order->buyer_email }})</p>
                <p class="text-[11px] text-slate-500 font-mono mt-1">Order Reference: {{ $order->reference }}</p>
            </div>

            <h4 class="font-serif-heading text-lg font-bold text-white uppercase tracking-widest mb-4">Your Digital Entry QR Passes</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($order->tickets as $ticket)
                <div class="bg-[#07080b]/80 border border-white/10 rounded-xl p-6 flex flex-col items-center justify-center text-center backdrop-blur-md">
                    <p class="font-serif-heading font-bold text-base text-white mb-1">{{ $ticket->ticketType->name }}</p>
                    <p class="text-xs text-slate-400 mb-4 font-light">Ticket Code: <span class="font-mono font-bold text-amber-300">{{ $ticket->ticket_code }}</span></p>
                    <div class="p-3 bg-white rounded-xl shadow-lg border border-white/20 inline-block">
                        {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(160)->generate($ticket->ticket_code) !!}
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </section>
</x-public-layout>

