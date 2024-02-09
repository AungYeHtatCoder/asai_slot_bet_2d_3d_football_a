<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>  $this->id,
            'game_id' =>  $this->game_id,
            'name_en'=> $this->name_en,
            'name_mm'=> $this->name_mm,
            'image' => $this->getImgUrlAttribute(),
            'click_count'=> $this->click_count,
            'game_type_id'=> $this->game_type_id,
            'provider_id'=> $this->provider_id

        ];
    }
}
