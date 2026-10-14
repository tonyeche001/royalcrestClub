<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'venue',
        'event_date',
        'banner_image',
        'is_published',
    ];
    protected $casts = [
        'event_date' => 'datetime',
        'is_published' => 'boolean',
    ];
    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, TicketType::class);
    }
}
