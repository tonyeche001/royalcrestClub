<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index ()
    {
        $events = Event::withCount('tickets')->orderbyDesc('event_date')->get();
        return view('admin.events.index', compact('events'));
    }
    public function create()
    {
        return view('admin.events.create');
    }
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string',
            'venue' => 'required|string|max:250',
            'event_date' => 'required|date|after:now',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2044',


         ]);
         if($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('event_banners','public');
         }
         $validated['is_published'] = $request->boolean('is_published');
         $event = event::create($validated);
         return redirect()->route('admin.events.edit', $event)
         ->with('success', 'Event created. Now add tickets types below.');
    }
    public function edit(Event $event) 
    {
        return view('admin.events.edit', compact('event'));
    }
    public function update(request $request, Event $event) 
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string',
            'venue' => 'required|string|max:255',
            'event_date' => 'required|date',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if($request->hasFile('banner_image')) {
            $validated['banner_image']=$request->file('banner_image')->store('event.banner','public');
        }
        $validated['is_published'] = $request->boolean('is_published');
        $event->update($validated);
        return redirect()->route('admin.events.index')
        ->with('success', 'Event updated.');
    }
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
        ->with('success', 'Event deleted successfully.');

    }
    
}
