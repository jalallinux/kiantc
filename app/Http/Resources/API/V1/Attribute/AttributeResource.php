<?php

namespace App\Http\Resources\API\V1\Attribute;

use App\Http\Resources\API\V1\AttributeProductValue\AttributeProductValueResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
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
            'title' => $this->resource->title,
            'created_at' => $this->resource->created_at->timestamp,
            'values' => AttributeProductValueResource::collection($this->resource->attributeProductValues),
        ];
    }
}
