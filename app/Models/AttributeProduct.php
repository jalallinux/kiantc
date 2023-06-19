<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeProduct extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    public $timestamps =  false;

    protected $fillable = [
        'product_id',
        'attribute_id',
    ];
}
