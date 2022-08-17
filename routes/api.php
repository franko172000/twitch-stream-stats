<?php

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

Route::group(['prefix' => 'auth/'], function () {
    Route::post('twitch/login', [\App\Http\Controllers\AuthController::class, 'loginWithTwitch']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'appLogout'])
        ->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('streams', [\App\Http\Controllers\StreamsController::class, 'topStreams']);
    Route::get('top-games', [\App\Http\Controllers\StreamsController::class, 'topGames']);
    Route::get('game-streams', [\App\Http\Controllers\StreamsController::class, 'streamsPerGame']);
    Route::get('streams-by-date', [\App\Http\Controllers\StreamsController::class, 'streamsByStartTime']);
    Route::get('sync-followed-streams', [\App\Http\Controllers\StreamsController::class, 'syncFollowedStreams']);
    Route::get('followed-streams', [\App\Http\Controllers\StreamsController::class, 'followedStreams']);
});
