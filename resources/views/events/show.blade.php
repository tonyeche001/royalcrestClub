<x-public-layout>

    <!-- EVENT HERO -->
    <section class="relative py-20 border-b border-white/5 overflow-hidden">
        <div class="absolute inset-0 opacity-20 z-0">
            @if($event->banner_image)
                <img src="{{ asset('storage/' . $event->banner_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('images/hero.jpg') }}" alt="{{ $event->title }}" class="w-full h-full object-cover" onerror="this.style.display='none';">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0b0e] via-[#0a0b0e]/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('events.index') }}" class="inline-flex items-center text-amber-300 hover:text-amber-200 text-xs font-semibold uppercase tracking-widest mb-6 group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to All Events
            </a>

            <div class="flex items-center text-amber-400 font-semibold text-xs tracking-wider uppercase mb-3">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $event->event_date->format('l, F j, Y • g:i A') }}
            </div>

            <h1 class="font-serif-heading text-4xl sm:text-6xl font-extrabold text-white mb-4 tracking-wide">
                {{ $event->title }}
            </h1>

            <p class="text-slate-300 text-xs sm:text-sm flex items-center font-light">
                <svg class="w-4 h-4 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Venue: <span class="font-semibold text-white ml-1.5">{{ $event->venue }}</span>
            </p>
        </div>
    </section>

    <!-- EVENT DETAILS & TICKET PURCHASE -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-6 py-4 rounded-2xl mb-8 text-xs font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Event Information -->
                <div class="lg:col-span-7 space-y-8">
                    
                    @if($event->banner_image)
                        <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                            <img src="{{ asset('storage/' . $event->banner_image) }}" alt="{{ $event->title }}" class="w-full h-[400px] object-cover">
                        </div>
                    @endif

                    <div class="dark-glass-card p-8 rounded-2xl space-y-4">
                        <h2 class="font-serif-heading text-xl font-bold text-white tracking-wide">ABOUT THIS EVENT</h2>
                        <div class="text-slate-300 leading-relaxed text-xs sm:text-sm font-light whitespace-pre-line">
                            {{ $event->description }}
                        </div>
                    </div>

                    <!-- Livewire Counter component -->
                    <div class="dark-glass-card p-6 rounded-2xl">
                        @livewire('event-ticket-counter', ['event' => $event])
                    </div>

                </div>

                <!-- Right: Ticket Purchase Form -->
                <div class="lg:col-span-5">
                    <div class="dark-glass-card border border-amber-500/30 p-8 rounded-2xl shadow-2xl sticky top-28">
                        
                        <div class="border-b border-white/10 pb-5 mb-6">
                            <h2 class="font-serif-heading text-2xl font-bold text-white tracking-wide">SECURE TICKETS</h2>
                            <p class="text-xs text-amber-300 mt-1 font-light">Select ticket tier & complete guest details below</p>
                        </div>

                        <!-- Ticket Purchase Form -->
                        <form action="{{ route('tickets.checkout', $event) }}" method="POST" class="space-y-5">
                            @csrf 

                            <!-- Ticket Type Selector -->
                            <div>
                                <label for="ticket_type_id" class="block text-[11px] font-semibold text-slate-300 uppercase tracking-widest mb-2">
                                    Select Ticket Tier *
                                </label>
                                <select id="ticket_type_id" 
                                        name="ticket_type_id" 
                                        class="w-full bg-[#08090c] border border-white/15 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors" 
                                        required>
                                    @foreach($event->ticketTypes as $type)
                                        @php 
                                            $remaining = $type->quantity - $type->tickets()->count();
                                        @endphp 
                                        <option value="{{ $type->id }}" @disabled($remaining <= 0)>
                                            {{ $type->name }} - ₦{{ number_format($type->price, 2) }}
                                            ({{ $remaining > 0 ? $remaining . ' available' : 'Sold Out' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-[11px] font-semibold text-slate-300 uppercase tracking-widest mb-2">
                                    Number of Tickets *
                                </label>
                                <input type="number" 
                                       id="quantity"
                                       name="quantity" 
                                       value="1" 
                                       min="1" 
                                       max="10" 
                                       class="w-full bg-[#08090c] border border-white/15 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors" 
                                       required>
                            </div>

                            <!-- Buyer Name -->
                            <div>
                                <label for="buyer_name" class="block text-[11px] font-semibold text-slate-300 uppercase tracking-widest mb-2">
                                    Full Name *
                                </label>
                                <input type="text" 
                                       id="buyer_name"
                                       name="buyer_name" 
                                       placeholder="e.g. Alexander Vance"
                                       class="w-full bg-[#08090c] border border-white/15 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors" 
                                       required>
                            </div>

                            <!-- Buyer Email -->
                            <div>
                                <label for="buyer_email" class="block text-[11px] font-semibold text-slate-300 uppercase tracking-widest mb-2">
                                    Email Address *
                                </label>
                                <input type="email" 
                                       id="buyer_email"
                                       name="buyer_email" 
                                       placeholder="alexander@example.com"
                                       class="w-full bg-[#08090c] border border-white/15 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors" 
                                       required>
                            </div>

                            <!-- Buyer Phone -->
                            <div>
                                <label for="buyer_phone" class="block text-[11px] font-semibold text-slate-300 uppercase tracking-widest mb-2">
                                    Phone Number *
                                </label>
                                <input type="text" 
                                       id="buyer_phone"
                                       name="buyer_phone" 
                                       placeholder="+234 800 000 0000"
                                       class="w-full bg-[#08090c] border border-white/15 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors" 
                                       required>
                            </div>

                            <button type="submit" 
                                    class="w-full gold-gradient-bg text-neutral-950 font-bold py-4 rounded-xl text-xs uppercase tracking-widest mt-4">
                                Buy Tickets Now
                            </button>

                            <p class="text-[11px] text-center text-slate-500 mt-3 font-light">
                                🔒 Encrypted payment via Paystack. Digital QR pass issued upon approval.
                            </p>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>

</x-public-layout>

