<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CharacterController;
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

Route::get('/', [WelcomeController::class, 'all']);
Route::post('/', [WelcomeController::class, 'search_view'])->name('/');
Route::get('call', [ApiController::class, 'call_rick_morty'])->name('call');
Route::post('edit/character', [CharacterController::class, 'edit'])->name('edit/character');