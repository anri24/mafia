<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TableController;
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)->group(function (){
    Route::get('/','index')->name('admin.main');
    Route::get('players/{table}','tablePlayers')->name('admin.table.players');
});

Route::controller(TableController::class)->group(function (){
    Route::get('add/table','add')->name('add.table');
    Route::post('store/table','store')->name('store.table');
    Route::post('player/roles/{table}','giveRoles')->name('player.roles');
    Route::post('start/table/{table}','start')->name('start.table');
    Route::post('start/again/table/{table}','startAgain')->name('start.again.table');
    Route::post('add/player/fall/{player}','playerFall')->name('add.player.fall');
    Route::post('add/candidate/{player}','addCandidate')->name('add.candidate');
    Route::get('candidates/{table}','candidates')->name('candidates');
});

Route::controller(RoleController::class)->group(function (){
    Route::get('roles','index')->name('roles');
    Route::get('add/role','add')->name('add.role');
    Route::get('role/statistic/{table}','showRoleStatistic')->name('role.statistic');
    Route::post('role/statistic/store/{table}','storeRoleStatistic')->name('role.statistic.Store');
    Route::post('store/role','store')->name('store.role');
    Route::post('kill/player/{player}','killPlayer')->name('kill.player');
});
