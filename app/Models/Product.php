<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function productCycle(): HasMany {
        return $this->hasMany(ProductCycle::class);
    }

    public function account(): HasMany {
        return $this->hasMany(Account::class);
    }

    public function getImageLinkAttribute() { 
        return $this->image ? asset($this->image) : 'https://placehold.co/50';
    }
}
