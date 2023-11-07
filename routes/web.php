<?php

use App\Http\Controllers\Main\MafiaController;
use App\Http\Controllers\Main\PlayerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PlayerController::class)->group(function (){
    Route::get('/','index')->name('index');
    Route::get('add/player/{table}','addPlayer')->name('add.player');
    Route::post('store/player/{table}','store')->name('store.player');
});

Route::controller(MafiaController::class)->group(function (){
    Route::get('show/role/{player}','start')->name('show.role');
});

Auth::routes();

Route::middleware(['web','auth'])
    ->prefix('admin')
    ->group(base_path('routes/admin.php'));
