<?php

namespace App\Http\Resources\API\V1\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
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
            'name' => $this->resource->token->name,
            'expires_at' => $this->resource->token->expires_at->timestamp,
            'access_token' => $this->resource->accessToken,
        ];
    }
}
