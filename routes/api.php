<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('Contact/store', [ContactController::class,'store'] );



Route::get('/Order/ChangeStatus/{id}', [OrderController::class,'ChangeStatus'])->name('home2.ChangeStatus');

Route::get('/Review/ChangeStatus/{id}', [ReviewController::class,'ChangeStatus'])->name('home2.Review_ChangeStatus');

