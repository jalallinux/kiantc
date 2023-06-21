<?php

namespace App\Http\Resources\API\V1\Product;

use App\Http\Resources\API\V1\Attribute\AttributeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
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
            'user_id' => $this->resource->user_id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'image_location' => $this->resource->image_location,
            'attributes_count' => $this->resource->attributes_count ?? 0,
            'attributes' => AttributeResource::collection($this->resource->attributes),
            'created_at' => $this->resource->created_at->timestamp,
            'updated_at' => $this->resource->updated_at->timestamp,
        ];
    }
}
