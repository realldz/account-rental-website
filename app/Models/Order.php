<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function item(): HasMany {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalPriceAttribute() {
        return number_format($this->total_price, 0, ',', ',');
    }
    public function complete() {
        $this->status = 1;
        $this->save();
    }

    public function close() {
        $this->status = -1;
        $this->save();
    }
}
