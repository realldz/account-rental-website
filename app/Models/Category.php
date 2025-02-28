<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function getImageLinkAttribute() {
        return $this->image ? asset($this->image) : 'https://placehold.co/20';
    }
}
