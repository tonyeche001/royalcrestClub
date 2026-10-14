<x-public-layout>

    <!-- ABOUT HERO -->
    <section class="relative py-24 bg-neutral-950 border-b border-neutral-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/hero.jpg') }}" alt="Royal Crest About" class="w-full h-full object-cover" onerror="this.style.display='none';">
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-amber-500 font-semibold text-sm tracking-widest uppercase">WHO WE ARE</span>
            <h1 class="font-serif-heading text-4xl sm:text-6xl font-extrabold text-white mt-3 mb-6">
                ABOUT ROYAL CREST <span class="gold-gradient-text">CLUB</span>
            </h1>
            <p class="text-neutral-300 text-lg max-w-3xl mx-auto leading-relaxed font-light">
                Setting the standard for luxury nightlife, entertainment, and hospitality in Wuse, Abuja, Nigeria.
            </p>
        </div>
    </section>

    <!-- OUR STORY SECTION -->
    <section class="py-20 bg-neutral-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="space-y-6">
                    <span class="text-amber-500 font-semibold text-sm tracking-widest uppercase">OUR VISION & LEGACY</span>
                    <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-white leading-tight">
                        A SANCTUARY FOR LUXURY NIGHTLIFE & CELEBRATION
                    </h2>
                    
                    <!-- TODO: replace about story text -->
                    <p class="text-neutral-300 leading-relaxed text-base">
                        Royal Crest Club was established in Wuse, Abuja, to deliver an unrivaled nightclub experience that rivals global entertainment capitals. From the moment you walk through our doors, you are immersed in a world of high-end aesthetics, thunderous acoustics, and premium service.
                    </p>

                    <!-- TODO: replace about experience text -->
                    <p class="text-neutral-400 leading-relaxed text-sm">
                        Our venue is thoughtfully designed with plush VIP leather booths, state-of-the-art intelligent lighting rigs, and a high-capacity main dance floor. Whether you are coming to celebrate a milestone, enjoy world-class mixology, or dance to Africa's top DJs, Royal Crest Club is your home.
                    </p>

                    <div class="grid grid-cols-2 gap-6 pt-4 border-t border-neutral-900">
                        <div>
                            <p class="font-serif-heading text-2xl font-bold text-amber-400">100%</p>
                            <p class="text-xs text-neutral-400 uppercase tracking-wider mt-1">Premium Vibe & Sound</p>
                        </div>
                        <div>
                            <p class="font-serif-heading text-2xl font-bold text-amber-400">Wuse, Abuja</p>
                            <p class="text-xs text-neutral-400 uppercase tracking-wider mt-1">Prime Central Location</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-2xl overflow-hidden border border-neutral-800 shadow-2xl">
                        <img src="{{ asset('images/hero.jpg') }}" alt="Royal Crest Lounge" class="w-full h-[450px] object-cover" onerror="this.src='https://images.unsplash.com/photo-1574391884720-bbc3740c59d1?auto=format&fit=crop&w=800&q=80';">
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-neutral-900/90 border border-amber-500/30 p-6 rounded-2xl hidden sm:block backdrop-blur-md">
                        <p class="font-serif-heading text-lg font-bold text-white">Abuja's Premier Nightlife</p>
                        <!-- TODO: replace tagline -->
                        <p class="text-xs text-neutral-400 mt-0.5">Where memories are created after dark</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- WHAT TO EXPECT SECTION -->
    <section class="py-20 bg-neutral-900/40 border-t border-neutral-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-amber-500 font-semibold text-sm tracking-widest uppercase">WHAT TO EXPECT</span>
                <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-white mt-2">THE Crest EXPERIENCE</h2>
                <p class="text-neutral-400 text-sm mt-3">Curated details designed for an unforgettable evening in Wuse.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Expect 1 -->
                <div class="bg-neutral-900/70 border border-neutral-800 p-8 rounded-2xl hover:border-amber-500/40 transition-all">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 font-bold text-xl mb-5">
                        01
                    </div>
                    <h3 class="font-serif-heading text-xl font-bold text-white mb-3">VIP Bottle & Booth Service</h3>
                    <!-- TODO: replace text -->
                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Enjoy elevated privacy with private VIP booth seating, dedicated bottle hostesses, custom sparkler shows, and international champagne selections.
                    </p>
                </div>

                <!-- Expect 2 -->
                <div class="bg-neutral-900/70 border border-neutral-800 p-8 rounded-2xl hover:border-amber-500/40 transition-all">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 font-bold text-xl mb-5">
                        02
                    </div>
                    <h3 class="font-serif-heading text-xl font-bold text-white mb-3">Celebrity DJs & Performances</h3>
                    <!-- TODO: replace text -->
                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Every weekend features guest DJ sets, Afrobeat superstars, Amapiano nights, and live hypemen bringing unrivaled energy to the crowd.
                    </p>
                </div>

                <!-- Expect 3 -->
                <div class="bg-neutral-900/70 border border-neutral-800 p-8 rounded-2xl hover:border-amber-500/40 transition-all">
                    <div class="w-12 h-12 rounded-xl gold-gradient-bg flex items-center justify-center text-neutral-950 font-bold text-xl mb-5">
                        03
                    </div>
                    <h3 class="font-serif-heading text-xl font-bold text-white mb-3">Signature Cocktails & Spirits</h3>
                    <!-- TODO: replace text -->
                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Our expert mixologists craft signature cocktails using premium spirits, fresh ingredients, and dramatic presentations.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="py-16 bg-neutral-950 border-t border-neutral-900 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="font-serif-heading text-3xl font-bold text-white mb-4">JOIN US THIS WEEKEND IN WUSE</h2>
            <p class="text-neutral-400 text-sm mb-8">Ready to experience Royal Crest Club live?</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('events.index') }}" class="gold-gradient-bg text-neutral-950 font-bold px-8 py-3.5 rounded-full text-sm hover:brightness-110 transition-all">
                    View Upcoming Events
                </a>
                <a href="{{ route('contact') }}" class="bg-neutral-900 hover:bg-neutral-800 text-white font-semibold px-8 py-3.5 rounded-full text-sm border border-neutral-700 transition-all">
                    Contact Us / VIP Inquiry
                </a>
            </div>
        </div>
    </section>

</x-public-layout>
