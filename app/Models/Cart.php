<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function productCycle(): BelongsTo
    {
        return $this->belongsTo(ProductCycle::class, 'cycle_id');
    }

    public function renewFor(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class, 'renew_for', 'id');
    }
}
