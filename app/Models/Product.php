<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    const SEARCHABLE = [
        'title',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_location',
    ];

    protected $withCount = [
        'attributes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function attributeProductValues(): HasManyThrough
    {
        return $this->hasManyThrough(AttributeProductValues::class, AttributeProduct::class, 'attribute_id', 'attribute_product_id');
    }

    public static function scopeSearch(Builder $query, array $search = [])
    {
        foreach ($search as $key => $value) {
            if (in_array($key, self::SEARCHABLE)) {
                $query->where("{$key}", 'ILIKE', "%{$value}%");
            }
        }
    }
}
