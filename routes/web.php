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
    Route::get('add/player/name/{table}','addPlayerPhone')->name('add.player.phone');
    Route::get('add/player/phone/{player}','addPlayerName')->name('add.player.name');
    Route::post('store/player/phone/{table}','storePhone')->name('store.player.phone');
    Route::post('store/player/name/{player}','StoreName')->name('store.player.name');
});

Route::controller(MafiaController::class)->group(function (){
    Route::get('show/role/{player}','start')->name('show.role');
    Route::post('store/vote/{fromPlayer}/{toPlayer}','storeVote')->name('store.vote');
});

Auth::routes();

Route::middleware(['web','auth'])
    ->prefix('admin')
    ->group(base_path('routes/admin.php'));
