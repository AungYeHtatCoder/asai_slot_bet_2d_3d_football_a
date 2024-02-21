<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerTransactionLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $response =  [
            'id' => $this->id,
            'created_at' => date_format($this->created_at, 'Y-m-d H:i:s')
        ];
        if ($request->type == 'deposit') {
            $response['amount'] = $this->cash_in;
        }
        if ($request->type == 'withdraw') {
            $response['amount'] = $this->cash_out;
        }
        return $response;
    }
}
