<?php

namespace App\Http\Controllers\Admin\GameType;

use App\Models\Admin\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class GameTypeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('game_type_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        // Retrieve all game types with their related providers
        $gameTypes = GameType::with('providers')->get();
        return view('admin.game_type.index', compact('gameTypes'));
    }
}
