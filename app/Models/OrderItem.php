<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'ticket_id',
        'quantity',
        'price_per_ticket',
    ];

    protected $casts = [
        'price_per_ticket' => 'decimal:2',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function ticket() : BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
