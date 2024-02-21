<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
 
        return [
            'game_name' =>  $this->name_en,
            'game_type' => $this->description,
            'total_bet' => $this->total_bet,
            'winlose' =>  $this->winlose,
            'play_time' => $this->play_time,
            'player_name' => $this->player_name
        ];
    }
}
