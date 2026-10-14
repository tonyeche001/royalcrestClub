<x-public-layout>

    <!-- EVENTS HERO -->
    <section class="relative py-20 border-b border-white/5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="text-amber-400 font-semibold text-xs tracking-widest uppercase">UPCOMING PARTIES & CONCERTS</span>
            <h1 class="font-serif-heading text-4xl sm:text-6xl font-extrabold text-white mt-2 mb-4 tracking-wide">
                ROYAL CREST <span class="gold-gradient-text">EVENTS</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm max-w-2xl mx-auto font-light leading-relaxed">
                Discover upcoming nightlife experiences in Wuse, Abuja. Reserve your tickets online for guaranteed entry and VIP access.
            </p>
        </div>
    </section>

    <!-- EVENTS LISTING GRID -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-6 py-4 rounded-2xl mb-8 text-xs font-medium">
                    {{ session('error') }}
                </div>
            @endif

            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        @php
                            $minPrice = $event->ticketTypes->min('price');
                        @endphp
                        <div class="group dark-glass-card rounded-2xl overflow-hidden transition-all duration-300 flex flex-col">
                            
                            <!-- Event Image -->
                            <div class="relative h-64 overflow-hidden bg-[#0a0b0e]">
                                @if($event->banner_image)
                                    <img src="{{ asset('storage/' . $event->banner_image) }}" 
                                         alt="{{ $event->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#12141c] via-[#0a0b0e] to-[#12141c] flex items-center justify-center">
                                        <svg class="w-16 h-16 text-amber-400/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-[#0a0b0e]/85 backdrop-blur-md border border-amber-500/30 text-amber-300 font-bold px-3.5 py-1.5 rounded-full text-xs shadow-lg">
                                    From ₦{{ number_format($minPrice ?? 0) }}
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center text-xs text-amber-300 font-semibold uppercase tracking-wider mb-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $event->event_date->format('D, M j, Y • g:i A') }}
                                    </div>

                                    <h2 class="font-serif-heading text-2xl font-bold text-white group-hover:text-amber-300 transition-colors mb-2 tracking-wide">
                                        {{ $event->title }}
                                    </h2>

                                    <p class="text-slate-400 text-xs line-clamp-3 mb-4 font-light leading-relaxed">
                                        {{ $event->description }}
                                    </p>

                                    <div class="flex items-center text-xs text-slate-400 mb-6 font-light">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $event->venue }}
                                    </div>
                                </div>

                                <a href="{{ route('events.show', $event) }}" 
                                   class="w-full text-center gold-gradient-bg text-neutral-950 font-bold py-3.5 rounded-xl text-xs uppercase tracking-widest block">
                                    Buy Tickets & View Details
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="dark-glass-card rounded-2xl p-16 text-center max-w-xl mx-auto">
                    <svg class="w-20 h-20 mx-auto text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="font-serif-heading text-2xl font-bold text-white mb-2">No Upcoming Events</h3>
                    <p class="text-slate-400 text-xs mb-6 font-light">There are currently no published upcoming events scheduled. Please check back soon!</p>
                    <a href="{{ route('home') }}" class="inline-block gold-gradient-bg text-neutral-950 font-bold px-6 py-3 rounded-full text-xs uppercase tracking-widest">
                        Return Home
                    </a>
                </div>
            @endif

        </div>
    </section>

</x-public-layout>

