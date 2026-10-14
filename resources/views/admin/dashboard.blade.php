<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-900 leading-tight">
                    Royal Crest Club: Admin
                </h2>
                <p class="text-xs text-slate-500 mt-0.5 font-normal">Venue Operations & Management Portal</p>
            </div>
            <div>
                <a href="{{ route('admin.checkin') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs uppercase font-semibold tracking-wider rounded-xl transition-colors shadow-sm">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                    Check-in Scanner
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-8rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Greeting Banner -->
            <div class="bg-white rounded-xl border border-slate-200/80 p-6 sm:p-8 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Welcome back, {{ auth()->user()->name }}
                    </h1>
                    <p class="text-sm text-slate-500 mt-1 font-normal">
                        Here's what's happening across your events.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Event
                    </a>
                </div>
            </div>

            <!-- Stat Cards Row (1 col mobile, 2 tablet, 4 desktop) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1: Total Events -->
                <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow transition-shadow flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">TOTAL EVENTS</span>
                        <div class="w-9 h-9 rounded-lg bg-amber-500/10 text-amber-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ number_format($totalEvents) }}</span>
                        <p class="text-xs text-slate-400 mt-1">Total active events</p>
                    </div>
                </div>

                <!-- Card 2: Tickets Sold -->
                <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow transition-shadow flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">TICKETS SOLD</span>
                        <div class="w-9 h-9 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 010 4 2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 00-2-2 2 2 0 010-4 2 2 0 002-2V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ number_format($ticketsSold) }}</span>
                        <p class="text-xs text-slate-400 mt-1">Issued passes</p>
                    </div>
                </div>

                <!-- Card 3: Checked In -->
                @php
                    $checkInPercentage = $ticketsSold > 0 ? min(100, round(($checkedIn / $ticketsSold) * 100)) : 0;
                @endphp
                <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow transition-shadow flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">CHECKED IN</span>
                        <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-baseline justify-between">
                            <span class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $checkedIn }} <span class="text-slate-400 text-xl font-medium">/ {{ $ticketsSold }}</span></span>
                            <span class="text-xs font-bold text-emerald-600">{{ $checkInPercentage }}%</span>
                        </div>
                        <!-- Progress Bar -->
                        <div class="w-full bg-slate-100 rounded-full h-1.5 mt-3 overflow-hidden">
                            <div class="bg-emerald-500 h-1.5 rounded-full transition-all duration-500" style="width: {{ $checkInPercentage }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Revenue -->
                <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow transition-shadow flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">REVENUE</span>
                        <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">₦{{ number_format($revenue, 2) }}</span>
                        <p class="text-xs text-slate-400 mt-1">Paid transactions</p>
                    </div>
                </div>

            </div>

            <!-- Upcoming Events Table Card -->
            <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Upcoming Events</h3>
                        <p class="text-xs text-slate-500">Scheduled night events and ticket details</p>
                    </div>
                    <a href="{{ route('admin.events.index') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-700 transition-colors flex items-center gap-1">
                        View all
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600">
                        <thead class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                            <tr>
                                <th scope="col" class="py-3.5 px-6">Event</th>
                                <th scope="col" class="py-3.5 px-6">Date & Time</th>
                                <th scope="col" class="py-3.5 px-6">Venue</th>
                                <th scope="col" class="py-3.5 px-6">Tickets Sold</th>
                                <th scope="col" class="py-3.5 px-6">Status</th>
                                <th scope="col" class="py-3.5 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($upcomingEvents as $event)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-4 px-6 font-semibold text-slate-900">
                                        {{ $event->title }}
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600 whitespace-nowrap font-medium">
                                        {{ $event->event_date->format('M d, Y g:i A') }}
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600">
                                        {{ $event->venue }}
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-900 font-semibold">
                                        {{ $event->tickets_count ?? $event->tickets()->count() }} tickets
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($event->is_published)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="inline-flex items-center text-xs font-semibold text-slate-700 hover:text-amber-600 transition-colors bg-slate-100 hover:bg-amber-50 px-3 py-1.5 rounded-lg border border-slate-200">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 px-6 text-center text-slate-400 text-sm font-light">
                                        No upcoming events scheduled yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

