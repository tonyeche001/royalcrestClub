<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_published', true)
        ->where('event_date', '>=', now())
        ->orderBy('event_date')
        ->get();
        return view('events.index',compact('events'));
    }
    public function show(Event $event)
    {
        if(!$event->is_published) {
            Abort(404);
        }
        $event->load('ticketTypes');
        return view('events.show', compact('event'));

    }
    
}
