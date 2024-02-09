<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\GameType;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class GameController extends Controller
{
    use HttpResponses;
    public function gameTypeProviders($gameTypeID)
    {
        $providers = GameType::with('providers')->where('id', $gameTypeID)
            ->first();
        return $this->success($providers);
    }

    public function gameTypes()
    {
        $gameTypes = GameType::where('id', '!=', 1)->orderBy('id', 'DESC')->get();

        // return $gameTypes;
        return $this->success($gameTypes);
    }
}
