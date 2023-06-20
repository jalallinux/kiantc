<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Attribute extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'title',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function values(): HasManyThrough
    {
        return $this->hasManyThrough(AttributeProductValues::class, AttributeProduct::class, 'attribute_id', 'attribute_product_id');
    }
}
