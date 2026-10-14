<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'event_id',
        'buyer_name',
        'buyer_phone',
        'buyer_email',
        'total_amount',
        'reference',
        'status',
        'paid_at'
    ];
    protected $cast = [
        'paid_at' => 'datetime',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
