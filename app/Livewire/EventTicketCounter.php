<?php

namespace App\Livewire;


use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;


class EventTicketCounter extends Component
{
    public Event $event;
    #[on('ticket-purchased')]

    public function render()
    {
        return view('livewire.event-ticket-counter', [
            'ticketTypes' => $this->event->ticketTypes()->withCount('tickets')->get(),
        ]);
    }
}
