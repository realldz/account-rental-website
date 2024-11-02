<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCycle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFormatedCyclePriceAttribute()
    {
        return number_format($this->cycle_price, 0, ',', ',');
    }
}
