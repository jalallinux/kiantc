<?php

namespace App\Http\Resources\API\V1\AttributeProductValue;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeProductValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'label' => $this->resource->label,
            'value' => $this->resource->value,
            'price' => $this->resource->price,
            'sell_count' => $this->resource->sell_count,
        ];
    }
}
