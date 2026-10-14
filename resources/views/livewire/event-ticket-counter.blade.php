<div class="space-y-3">
    <h3 class="font-serif-heading text-xs uppercase tracking-widest text-slate-300 font-bold mb-3">TICKET TIER AVAILABILITY</h3>
    @foreach($ticketTypes as $type)
        @php 
            $remaining = $type->quantity - $type->tickets_count;
        @endphp 
        <div class="flex justify-between items-center bg-[#07080b]/70 border border-white/10 rounded-xl px-4 py-3.5">
            <div>
                <p class="font-bold text-sm text-white">{{ $type->name }}</p>
                <p class="text-xs text-amber-300 font-medium">₦{{ number_format($type->price, 2) }}</p>
            </div>
            <span class="text-xs font-semibold px-3 py-1 rounded-full border {{ $remaining > 0 ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30' : 'bg-red-500/10 text-red-400 border-red-500/30' }}">
                {{ $remaining > 0 ? $remaining . ' available' : 'Sold out' }}
            </span>
        </div>
    @endforeach 
</div>

