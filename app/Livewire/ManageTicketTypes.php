<?php

namespace App\Livewire;
use App\Models\Event;

use Livewire\Component;

class ManageTicketTypes extends Component
{

    public Event $event;
    public $name = '';
    public $price = '';
    public $quantity = '';

    protected $rules = [
        'name' => 'required|string:max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:1',
    ];
    public function addTicketType()
    {
        $this->validate();
        $this->event->ticketTypes()->create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);
        $this->reset(['name', 'price', 'quantity']);
    }
    public function deleteTicketTypes($ticketTypeId)
    {
        $this->event->ticketTypes()->where('id', $ticketTypeId)->delete();
    }
    public function render()
    {
        return view('livewire.manage-ticket-types', [
            'ticketTypes' => $this->event->ticketTypes()->withCount('tickets')->get(),
        ]);
    }
}
