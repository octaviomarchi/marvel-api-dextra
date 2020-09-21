<?php

use App\Http\Controllers\Character\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'characters'], function () {
    Route::get('/', [CharacterController::class, 'getAll']);
    Route::group(['prefix' => '{id}'], function () {
      Route::get('/', [CharacterController::class, 'getById']);
      Route::get('/comics', [CharacterController::class, 'getCharacterComics']);
      Route::get('/events', [CharacterController::class, 'getCharacterEvents']);
    });
});

