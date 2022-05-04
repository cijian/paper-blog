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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/article', [\App\Http\Controllers\Api\ArticleController::class,'index']);
Route::get('/detail', [\App\Http\Controllers\Api\ArticleController::class,'detail']);
Route::get('/labels', [\App\Http\Controllers\Api\ArticleController::class,'labels']);
Route::post('/comment', [\App\Http\Controllers\Api\ArticleController::class,'comment']);
