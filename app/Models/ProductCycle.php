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
}
