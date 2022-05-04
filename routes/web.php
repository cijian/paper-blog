<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\NewController;
use \App\Http\Controllers\AnimationController;
use \App\Http\Controllers\CartoonController;
use \App\Http\Controllers\PeripheryController;
use \App\Http\Controllers\MusicController;
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

//Route::get('/', [IndexController::class, 'index'])->name('home');
//Route::get('/news', [NewController::class, 'index'])->name('news');
//Route::get('/news/detail', [NewController::class, 'detail'])->name('news.detail');
//Route::get('/animations', [AnimationController::class, 'index'])->name('animations');
//Route::get('/animations/detail', [AnimationController::class, 'detail'])->name('animations.detail');
//Route::get('/animations/info', [AnimationController::class, 'info'])->name('animations.info');
//Route::get('/animations/show', [AnimationController::class, 'show'])->name('animations.show');
//
//Route::get('/cartoon', [CartoonController::class, 'index'])->name('cartoon');
//Route::get('/cartoon/ajax', [CartoonController::class, 'ajaxManHua'])->name('cartoon.ajax');
//
//
//Route::get('/periphery', [PeripheryController::class, 'index'])->name('periphery');
//Route::get('/periphery/show', [PeripheryController::class, 'show'])->name('periphery.show');
//Route::get('/periphery/ajax', [PeripheryController::class, 'ajax'])->name('periphery.ajax');
//
//
//Route::get('/music', [MusicController::class, 'index'])->name('music');
//Route::get('/music/show', [MusicController::class, 'show'])->name('music.show');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{param}',function (){
   return redirect('/');
});
