<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\StatusController;


Route::controller(StatusController::class)->group(function () {
    Route::get('/status', 'get');
});


Route::controller(CompanyController::class)->group(function () {
    Route::get('/company/{id}', 'get');
    Route::post('/company', 'post');
    Route::patch('/company/{id}', 'patch');
    Route::delete('/company/{id}', 'delete');
});
