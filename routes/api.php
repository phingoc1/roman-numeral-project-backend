<?php

use App\Http\Controllers\ApiControllers\RomanNumeralsApiController;
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

Route::middleware(['throttle:30:1'])->group(function () {
    Route::post('/roman-numerals-easy', [RomanNumeralsApiController::class, 'easy']);
    Route::post('/roman-numerals-advanced', [RomanNumeralsApiController::class, 'advanced']);
});
