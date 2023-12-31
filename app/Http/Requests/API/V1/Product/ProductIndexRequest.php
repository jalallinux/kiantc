<?php

namespace App\Http\Requests\API\V1\Product;

use App\Http\Requests\API\PaginateAndSearchableRequest;

class ProductIndexRequest extends PaginateAndSearchableRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function orderBy(): array
    {
        return ['sell_count', 'price', 'created_at', 'updated_at'];
    }

    public function searchRules(): array
    {
        return [
            'search' => ['nullable', 'array'],
            'search.title' => ['nullable', 'string'],
        ];
    }
}
