<?php

use App\Http\Controllers\Api\V1\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\StatusController;


Route::controller(StatusController::class)->group(function () {
    Route::get('/status', 'get');
});


Route::controller(CompanyController::class)->group(function () {
    Route::get('/company/{id}', 'get')->name('company.get');
    Route::post('/company', 'store')->name('company.store');
    Route::patch('/company/{id}', 'update')->name('company.update');
    Route::delete('/company/{id}', 'destroy')->name('company.delete');
    Route::get('/company/{id}/stations/count', 'getStationsCount')->name('company.station.count');
    Route::get('/company/{id}/stations/list', 'getStationsList')->name('company.station.list');

});

Route::controller(StationController::class)->group(function () {
    Route::get('/station/{id}', 'get');
    Route::post('/station', 'store');
    Route::patch('/station/{id}', 'update');
    Route::delete('/station/{id}', 'destroy');
    Route::get('/stations/radius', 'getStationsInRadius');
});
