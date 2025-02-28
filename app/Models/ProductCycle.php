<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCycle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getFormatedCyclePriceAttribute()
    {
        return number_format($this->cycle_price, 0, ',', ',');
    }

    public function getCycleLabelAttribute()
    {
        switch ($this->cycle_unit) {
            case 1:
                return 'Ngày';
            case 2:
                return 'Tuần';
            case 3:
                return 'Tháng';
            case 4:
                return 'Năm';
        }   
    }

    public function getCycleUnitToStringAttribute()
    {
        switch ($this->cycle_unit) {
            case 1:
                return 'day';
            case 2:
                return 'week';
            case 3:
                return 'month';
            case 4:
                return 'year';
        }   
    }
}
