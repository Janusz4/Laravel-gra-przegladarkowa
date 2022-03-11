<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AttackController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::get('/game', [App\Http\Controllers\GameController::class, 'index'])->name('game');

Route::get('/materials', function () {
    return view('game.materials');
});

Route::get('/castle_info', function () {
    return view('game.castle_info');
});

Route::get('/castle_upgrade', function () {
    return view('game.castle_upgrade');
});

Route::get('/sawmill_info', function () {
    return view('game.sawmill_info');
});

Route::get('/sawmill_upgrade', function () {
    return view('game.sawmill_upgrade');
});

Route::get('/quarry_info', function () {
    return view('game.quarry_info');
});

Route::get('/quarry_upgrade', function () {
    return view('game.quarry_upgrade');
});

Route::get('/field_info', function () {
    return view('game.field_info');
});

Route::get('/field_upgrade', function () {
    return view('game.field_upgrade');
});

Route::get('/barracks_info', function () {
    return view('game.barracks_info');
});

Route::get('/barracks_upgrade', function () {
    return view('game.barracks_upgrade');
});

Route::get('/worriors', function () {
    return view('game.worriors');
});

Route::get('/archers', function () {
    return view('game.archers');
});

Route::resource('/attack', AttackController::class);

Route::get('/ranking', function () {
    return view('game.ranking');
});

Route::resource('/admin', AdminController::class);
Route::get('/admin/ban/{id}', 'App\Http\Controllers\AdminController@ban');
Route::get('/admin/unban/{id}', 'App\Http\Controllers\AdminController@unban');
Route::get('/search','App\Http\Controllers\AdminController@search');
