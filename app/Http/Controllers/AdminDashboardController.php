<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $ticketsSold = Ticket::count();
        $checkedIn = Ticket::where('is_checked_in', true)->count();
        $revenue = Order::where('status', 'paid')->sum('total_amount');
        $upcomingEvents = Event::where('event_date', '>=', now())
        ->orderBy('event_date')
        ->get(); 
        return view('admin.dashboard', compact('totalEvents','ticketsSold','revenue','upcomingEvents','checkedIn'));
    }
    
}
