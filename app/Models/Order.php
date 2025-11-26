<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Pesanan punya banyak Item
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
