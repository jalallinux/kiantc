<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeProductValues extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_product_id',
        'label',
        'value',
        'price',
        'sell_count',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function attributeProduct(): BelongsTo
    {
        return $this->belongsTo(AttributeProduct::class);
    }
}
