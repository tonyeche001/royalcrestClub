<x-public-layout>

    <!-- HERO SECTION -->
    <section class="relative min-h-[88vh] flex items-center justify-center overflow-hidden">
        <!-- Background Image with Ambient Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.jpg') }}" 
                 alt="Royal Crest Club Nightlife" 
                 class="w-full h-full object-cover object-center filter brightness-50 scale-105 transition-transform duration-1000"
                 onerror="this.parentElement.style.background='radial-gradient(circle at center, #161824 0%, #0a0b0e 100%)'; this.style.display='none';">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0b0e] via-[#0a0b0e]/75 to-[#0a0b0e]/40"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
            
            <div class="inline-flex items-center space-x-2.5 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/25 backdrop-blur-md mb-8">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-xs uppercase tracking-widest font-semibold text-amber-300">Wuse, Abuja, Nigeria • Premier VIP Venue</span>
            </div>

            <h1 class="font-serif-heading text-5xl sm:text-7xl lg:text-8xl font-extrabold tracking-tight text-white mb-6 leading-none drop-shadow-2xl">
                ROYAL CREST <span class="gold-gradient-text">CLUB</span>
            </h1>

            <p class="text-base sm:text-xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed mb-10 tracking-wide">
                Where extraordinary sound, high-octane energy, and luxury VIP hospitality converge in the heart of Abuja.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                <a href="{{ route('events.index') }}" 
                   class="w-full sm:w-auto gold-gradient-bg text-neutral-950 font-bold px-9 py-4 rounded-full text-xs uppercase tracking-widest">
                    Buy Tickets Now
                </a>
                <a href="#events" 
                   class="w-full sm:w-auto bg-[#121520]/80 hover:bg-white/10 text-slate-200 font-semibold px-8 py-4 rounded-full text-xs uppercase tracking-widest border border-white/10 hover:border-amber-400/40 transition-all backdrop-blur-md">
                    Explore Events
                </a>
            </div>

        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-10 text-slate-500 animate-bounce">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- FEATURED UPCOMING EVENTS SECTION -->
    <section id="events" class="py-24 border-t border-white/5 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14">
                <div>
                    <span class="text-amber-400 font-semibold text-xs tracking-widest uppercase">UPCOMING PARTIES & PERFORMANCES</span>
                    <h2 class="font-serif-heading text-3xl sm:text-5xl font-bold text-white mt-2 tracking-wide">FEATURED EVENTS</h2>
                </div>
                <a href="{{ route('events.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-amber-300 hover:text-amber-200 font-semibold text-xs uppercase tracking-widest group">
                    View Full Schedule 
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        @php
                            $minPrice = $event->ticketTypes->min('price');
                        @endphp
                        <div class="group dark-glass-card rounded-2xl overflow-hidden transition-all duration-300 flex flex-col">
                            
                            <!-- Event Banner Image -->
                            <div class="relative h-60 overflow-hidden bg-[#0a0b0e]">
                                @if($event->banner_image)
                                    <img src="{{ asset('storage/' . $event->banner_image) }}" 
                                         alt="{{ $event->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#12141c] via-[#0a0b0e] to-[#12141c] flex items-center justify-center">
                                        <svg class="w-16 h-16 opacity-30 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-[#0a0b0e]/85 backdrop-blur-md border border-amber-500/30 text-amber-300 font-bold px-3.5 py-1.5 rounded-full text-xs">
                                    From ₦{{ number_format($minPrice ?? 0) }}
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center text-xs text-amber-300 font-semibold tracking-wider uppercase mb-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $event->event_date->format('D, M j, Y • g:i A') }}
                                    </div>
                                    <h3 class="font-serif-heading text-xl font-bold text-white group-hover:text-amber-300 transition-colors mb-2 tracking-wide">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-slate-400 text-xs leading-relaxed line-clamp-2 mb-4 font-light">
                                        {{ $event->description }}
                                    </p>
                                    <p class="text-xs text-slate-400 flex items-center mb-6">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $event->venue }}
                                    </p>
                                </div>

                                <a href="{{ route('events.show', $event) }}" 
                                   class="w-full text-center gold-gradient-bg text-neutral-950 font-bold py-3.5 rounded-xl text-xs uppercase tracking-widest block">
                                    Buy Tickets & Details
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="dark-glass-card rounded-2xl p-12 text-center max-w-xl mx-auto">
                    <svg class="w-16 h-16 mx-auto text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white mb-2 font-serif-heading">No Upcoming Events Right Now</h3>
                    <p class="text-slate-400 text-xs mb-6">We are curating our next major lineup. Check back soon for exclusive event announcements.</p>
                    <a href="{{ route('contact') }}" class="inline-block border border-amber-500/40 text-amber-300 hover:bg-amber-500/10 px-6 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors">
                        Inquire for VIP Booking
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- EXPERIENCE SECTION -->
    <section class="py-24 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="space-y-6">
                    <span class="text-amber-400 font-semibold text-xs tracking-widest uppercase">THE EXPERIENCE</span>
                    <h2 class="font-serif-heading text-3xl sm:text-5xl font-bold text-white leading-tight tracking-wide">
                        ABUJA'S PREMIER NIGHTLIFE DESTINATION
                    </h2>
                    <p class="text-slate-300 leading-relaxed text-sm font-light">
                        Situated in the vibrant epicentre of Wuse, Royal Crest Club defines executive nightlife. Engineered for music purists, trendsetters, and VIP guests, we combine acoustic precision, craft mixology, and world-class artist showcases.
                    </p>
                    <p class="text-slate-400 leading-relaxed text-xs font-light">
                        Elevate your weekend with reserved private booth hosting, custom bottle service, and an unforgettable sensory atmosphere.
                    </p>

                    <div class="pt-4">
                        <a href="{{ route('about') }}" class="gold-gradient-bg text-neutral-950 font-bold px-7 py-3.5 rounded-full text-xs uppercase tracking-widest inline-block">
                            Discover The Royal Crest Experience
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                        <img src="{{ asset('images/image2.jpeg') }}" alt="Royal Crest Vibe" class="w-full h-[400px] object-cover" onerror="this.src='https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=800&q=80';">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0b0e] via-transparent to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 dark-glass-card p-6 rounded-2xl hidden sm:block border border-amber-500/30">
                        <p class="font-serif-heading text-3xl font-bold gold-gradient-text">100%</p>
                        <p class="text-xs text-slate-400 uppercase tracking-widest mt-1 font-semibold">Exquisite Nightlife Sanctuary</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- WHY ROYAL CREST (FEATURE CARDS) -->
    <section class="py-24 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-amber-400 font-semibold text-xs tracking-widest uppercase">EXCELLENCE DEFINED</span>
                <h2 class="font-serif-heading text-3xl sm:text-5xl font-bold text-white mt-2 tracking-wide">WHY ROYAL CREST CLUB</h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-3 font-light">Curated for discerning guests who expect flawless sound, premium spirits, and discreet security.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Card 1 -->
                <div class="dark-glass-card p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif-heading text-lg font-bold text-white mb-2 tracking-wide">World-Class Sound</h3>
                    <p class="text-slate-400 text-xs leading-relaxed font-light">Custom acoustic design, deep bass resonance, and synchronized laser lighting arrays.</p>
                </div>

                <!-- Card 2 -->
                <div class="dark-glass-card p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif-heading text-lg font-bold text-white mb-2 tracking-wide">VIP Table Service</h3>
                    <p class="text-slate-400 text-xs leading-relaxed font-light">Dedicated bottle hosts, vintage champagne, and premium international spirits.</p>
                </div>

                <!-- Card 3 -->
                <div class="dark-glass-card p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif-heading text-lg font-bold text-white mb-2 tracking-wide">Elite DJ Lineups</h3>
                    <p class="text-slate-400 text-xs leading-relaxed font-light">Headlining international guest DJs and Nigeria’s top resident selectors weekly.</p>
                </div>

                <!-- Card 4 -->
                <div class="dark-glass-card p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif-heading text-lg font-bold text-white mb-2 tracking-wide">Discreet & Secure</h3>
                    <p class="text-slate-400 text-xs leading-relaxed font-light">Refined dress code, professional security personnel, and secure valet parking.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- CALL-TO-ACTION BANNER -->
    <section class="py-20 relative overflow-hidden border-t border-b border-white/5">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="font-serif-heading text-3xl sm:text-5xl font-extrabold text-white mb-4 tracking-wide">
                JOIN US THIS WEEKEND
            </h2>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mb-8 font-light">
                Secure your entry tickets online or contact our concierge for VIP booth reservations.
            </p>
            <a href="{{ route('events.index') }}" class="gold-gradient-bg text-neutral-950 font-bold px-9 py-4 rounded-full text-xs uppercase tracking-widest inline-block">
                Buy Tickets Now
            </a>
        </div>
    </section>

</x-public-layout>

