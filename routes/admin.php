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
    Route::post('start/table/{table}','startTable')->name('start.table');
});

Route::controller(RoleController::class)->group(function (){
    Route::get('roles','index')->name('roles');
    Route::get('add/role','add')->name('add.role');
    Route::get('role/statistic/{table}','roleStatistic')->name('role.statistic');
    Route::post('role/statistic/store/{table}','roleStatisticStore')->name('role.statistic.Store');
    Route::post('store/role','store')->name('store.role');
});
