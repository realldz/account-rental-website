<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function oldItem(): HasOne {
        return $this->hasOne(OrderItem::class, 'id', 'old_item');
    }

    public function getFormatedPriceAttribute() {
        return number_format($this->price, 0, ',', ',');
    }
}
