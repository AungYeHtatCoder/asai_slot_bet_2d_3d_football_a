<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Game;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\BannerText;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->take(3)->get();
        $games = Game::latest()->get();
        $marqueeText = BannerText::latest()->first();
        return view('welcome', compact('banners', 'games', 'marqueeText'));
    }
}