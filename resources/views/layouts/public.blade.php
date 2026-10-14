<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Royal Crest Club') }} | Wuse's Premier Nightlife Venue</title>
    <meta name="description" content="Royal Crest Club is Wuse, Abuja's premier nightclub & event venue featuring luxury VIP lounge, world-class DJs, craft cocktails, and high-energy events.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0a0b0e;
            color: #e2e8f0;
        }
        .font-serif-heading {
            font-family: 'Cinzel', serif;
        }
        /* Mature Metallic Champagne Gold Text Gradient */
        .gold-gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #fef08a 25%, #d4af37 65%, #9e7d3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Executive Champagne Gold Button Styling */
        .gold-gradient-bg, .btn-buy-ticket {
            background: linear-gradient(135deg, #dfb743 0%, #c5a059 50%, #9e7a2b 100%);
            color: #0b0c10;
            font-weight: 700;
            letter-spacing: 0.04em;
            border: 1px solid rgba(255, 235, 170, 0.35);
            box-shadow: 0 4px 20px rgba(212, 175, 55, 0.22);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .gold-gradient-bg:hover, .btn-buy-ticket:hover {
            filter: brightness(1.1);
            transform: translateY(-1.5px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.38);
        }
        .gold-border-glow {
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.12);
            border-color: rgba(212, 175, 55, 0.3);
        }
        .mature-club-bg {
            background-color: #0a0b0e;
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(212, 175, 55, 0.07) 0%, rgba(10, 11, 14, 0) 50%),
                radial-gradient(circle at 85% 30%, rgba(20, 24, 38, 0.4) 0%, rgba(10, 11, 14, 0) 60%),
                radial-gradient(circle at 15% 70%, rgba(25, 28, 42, 0.3) 0%, rgba(10, 11, 14, 0) 50%);
        }
        .dark-glass-card {
            background: rgba(16, 18, 26, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        .dark-glass-card:hover {
            border-color: rgba(212, 175, 55, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 20px rgba(212, 175, 55, 0.08);
        }
    </style>
</head>
<body class="antialiased mature-club-bg text-slate-200 flex flex-col min-h-screen selection:bg-amber-500 selection:text-black">

    <!-- STICKY NAVBAR -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-[#0a0b0e]/85 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Royal Crest Club Logo" 
                         class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span class="font-serif-heading font-bold text-xl sm:text-2xl tracking-widest text-white group-hover:text-amber-300 transition-colors">
                        ROYAL CREST <span class="gold-gradient-text font-extrabold">CLUB</span>
                    </span>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-9">
                    <a href="{{ route('home') }}" 
                       class="text-xs uppercase tracking-widest font-medium transition-colors hover:text-amber-300 {{ request()->routeIs('home') ? 'text-amber-400 font-semibold border-b-2 border-amber-400 pb-1' : 'text-slate-300' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" 
                       class="text-xs uppercase tracking-widest font-medium transition-colors hover:text-amber-300 {{ request()->routeIs('about') ? 'text-amber-400 font-semibold border-b-2 border-amber-400 pb-1' : 'text-slate-300' }}">
                        About Us
                    </a>
                    <a href="{{ route('events.index') }}" 
                       class="text-xs uppercase tracking-widest font-medium transition-colors hover:text-amber-300 {{ request()->routeIs('events.*') ? 'text-amber-400 font-semibold border-b-2 border-amber-400 pb-1' : 'text-slate-300' }}">
                        Events
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="text-xs uppercase tracking-widest font-medium transition-colors hover:text-amber-300 {{ request()->routeIs('contact') ? 'text-amber-400 font-semibold border-b-2 border-amber-400 pb-1' : 'text-slate-300' }}">
                        Contact
                    </a>
                </nav>

                <!-- Action Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('events.index') }}" 
                       class="gold-gradient-bg text-neutral-950 font-bold px-6 py-2.5 rounded-full text-xs uppercase tracking-widest transition-all">
                        Buy Tickets
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" type="button" class="text-slate-300 hover:text-white p-2 rounded-md focus:outline-none" aria-label="Toggle menu">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#0e1017]/95 border-b border-white/10 px-4 pt-3 pb-6 space-y-3 backdrop-blur-xl">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium uppercase tracking-wider {{ request()->routeIs('home') ? 'text-amber-400 font-semibold bg-white/5' : 'text-slate-300 hover:bg-white/5' }}">
                Home
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-sm font-medium uppercase tracking-wider {{ request()->routeIs('about') ? 'text-amber-400 font-semibold bg-white/5' : 'text-slate-300 hover:bg-white/5' }}">
                About Us
            </a>
            <a href="{{ route('events.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium uppercase tracking-wider {{ request()->routeIs('events.*') ? 'text-amber-400 font-semibold bg-white/5' : 'text-slate-300 hover:bg-white/5' }}">
                Events
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg text-sm font-medium uppercase tracking-wider {{ request()->routeIs('contact') ? 'text-amber-400 font-semibold bg-white/5' : 'text-slate-300 hover:bg-white/5' }}">
                Contact
            </a>
            <div class="pt-2">
                <a href="{{ route('events.index') }}" class="block text-center gold-gradient-bg text-neutral-950 font-bold px-5 py-3 rounded-full text-xs uppercase tracking-widest">
                    Buy Tickets
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#07080a] border-t border-white/5 pt-16 pb-12 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                
                <!-- Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Royal Crest Club" 
                             class="h-9 w-auto"
                             onerror="this.style.display='none'">
                        <span class="font-serif-heading font-bold text-xl text-white tracking-wider">ROYAL CREST <span class="gold-gradient-text">CLUB</span></span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">
                        Wuse's premier nightlife & event destination in Abuja, Nigeria. Delivering extraordinary sound, VIP luxury, and world-class entertainment.
                    </p>
                    <div class="pt-2 flex items-center space-x-4">
                        <a href="#" class="text-slate-400 hover:text-amber-300 transition-colors" title="Instagram">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-amber-300 transition-colors" title="Facebook">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.714 5H18V0h-3.808C10.592 0 9 1.583 9 4.615V8z"/></svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-amber-300 transition-colors" title="Twitter/X">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-serif-heading font-semibold text-white tracking-widest text-xs uppercase mb-4">NAVIGATE</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-300 transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-amber-300 transition-colors">About Royal Crest</a></li>
                        <li><a href="{{ route('events.index') }}" class="hover:text-amber-300 transition-colors">Upcoming Events</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-300 transition-colors">Contact & Reservations</a></li>
                    </ul>
                </div>

                <!-- Opening Hours -->
                <div>
                    <h3 class="font-serif-heading font-semibold text-white tracking-widest text-xs uppercase mb-4">OPENING HOURS</h3>
                    <ul class="space-y-2 text-xs">
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Thu - Sat:</span>
                            <span class="text-amber-300 font-medium">10:00 PM - 5:00 AM</span>
                        </li>
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Sunday:</span>
                            <span class="text-amber-300 font-medium">10:00 PM - 4:00 AM</span>
                        </li>
                        <li class="flex justify-between pb-1 text-slate-500">
                            <span>Mon - Wed:</span>
                            <span>Private Events</span>
                        </li>
                    </ul>
                </div>

                <!-- Location & Contact -->
                <div>
                    <h3 class="font-serif-heading font-semibold text-white tracking-widest text-xs uppercase mb-4">LOCATION</h3>
                    <p class="text-xs leading-relaxed mb-3 text-slate-300">
                        Plot 12, Wuse Zone 2, Wuse, Abuja, Nigeria.
                    </p>
                    <p class="text-xs mb-1">
                        <span class="text-slate-500">Tel:</span> <a href="tel:+2348000000000" class="text-amber-300 hover:underline">+234 800 000 0000</a>
                    </p>
                    <p class="text-xs">
                        <span class="text-slate-500">Email:</span> <a href="mailto:info@royalcrestclub.com" class="text-amber-300 hover:underline">info@royalcrestclub.com</a>
                    </p>
                </div>

            </div>

            <div class="mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between text-[11px] text-slate-500">
                <p>&copy; {{ date('Y') }} Royal Crest Club. All rights reserved.</p>
                <p class="mt-2 md:mt-0 uppercase tracking-widest">Wuse, Abuja, Nigeria</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    @livewireScripts
</body>
</html>

