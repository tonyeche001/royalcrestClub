<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-900 leading-tight">
                    Events
                </h2>
                <p class="text-xs text-slate-500 mt-0.5 font-normal">Manage all venue events, tickets, and publishing status</p>
            </div>
            
            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2.5 rounded-xl text-xs uppercase tracking-wider transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Event
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-8rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Event Directory</h3>
                        <p class="text-xs text-slate-500">List of all created events and ticket activity</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600">
                        <thead class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                            <tr>
                                <th scope="col" class="py-3.5 px-6">Event Name</th>
                                <th scope="col" class="py-3.5 px-6">Date & Time</th>
                                <th scope="col" class="py-3.5 px-6">Venue</th>
                                <th scope="col" class="py-3.5 px-6">Tickets Sold</th>
                                <th scope="col" class="py-3.5 px-6">Status</th>
                                <th scope="col" class="py-3.5 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($events as $event)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-4 px-6 font-semibold text-slate-900">
                                        <div class="flex items-center gap-3">
                                            @if($event->banner_image)
                                                <img src="{{ asset('storage/' . $event->banner_image) }}" alt="" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                            @else
                                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0 text-slate-400">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="font-bold text-slate-900">{{ $event->title }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600 whitespace-nowrap font-medium">
                                        {{ $event->event_date->format('M d, Y g:i A') }}
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600">
                                        {{ $event->venue }}
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-900 font-semibold">
                                        {{ $event->tickets_count }} tickets
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
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('events.show', $event) }}" target="_blank" class="inline-flex items-center text-xs font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg border border-slate-200 transition-colors" title="View Public Event Page">
                                                View
                                            </a>
                                            <a href="{{ route('admin.events.edit', $event) }}" class="inline-flex items-center text-xs font-semibold text-slate-800 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200/80 px-3 py-1.5 rounded-lg transition-colors">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');" class="inline-block">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center text-xs font-semibold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 border border-red-200/60 px-3 py-1.5 rounded-lg transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 px-6 text-center text-slate-400 text-sm font-light">
                                        No events found. Click <a href="{{ route('admin.events.create') }}" class="text-amber-600 font-semibold hover:underline">New Event</a> to create your first event.
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

