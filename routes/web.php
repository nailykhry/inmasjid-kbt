<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/chat', [PusherController::class, 'index']);
Route::post('/broadcast', [PusherController::class, 'broadcast']);
Route::post('/receive', [PusherController::class, 'receive']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

