<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'icon' => $this->getImgUrlAttribute(),
            'providers' => $this->providers->map(function ($provider) {
                return [
                    'id' => $provider->id,
                    'description' => $provider->description,
                    'image' => $provider->getImgUrlAttribute()
                ];
            }),
        ];
    }
}
