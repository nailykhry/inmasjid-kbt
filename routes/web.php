<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('lost-founds', LostFoundController::class);

Route::get('/maps', [MapController::class,'index'])->name('maps');

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});


Route::get('/chat/{user}', [PusherController::class, 'show'])->name('chat.show')->middleware('auth');
Route::post('/chat/send', [PusherController::class, 'send'])->name('chat.send')->middleware('auth');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

