<?php

use App\Http\Controllers\Admin\Agent\AgentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\GameController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\BannerTextController;
use App\Http\Controllers\Admin\Master\MasterController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\GameType\GameTypeController;
use App\Http\Controllers\Admin\Transfer\TransferLogController;
use App\Http\Controllers\HomeController;

require_once __DIR__ . '/admin.php';


Auth::routes();




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/api_dashboard', [HomeController::class, 'apiDashboard'])->name('api_dashboard');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

//auth routes

Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');