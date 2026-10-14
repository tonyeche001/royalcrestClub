<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'price',
        'quantity'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function getRemainingAttribute()
    {
        return max(0, $this->quantity - $this->tickets()->count());
    }
}
