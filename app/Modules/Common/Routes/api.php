<?php

use App\Modules\Common\Http\Controllers\Api\MinistryController;
use App\Modules\Common\Http\Controllers\Api\ProvinceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Common Routes
|--------------------------------------------------------------------------
*/
Route::prefix('provinces')->group(function () {
    Route::get('/', [ProvinceController::class, 'filter']);
});

Route::prefix('ministries')->group(function () {
    Route::get('/', [MinistryController::class, 'filter']);
    Route::post('/', [MinistryController::class, 'store']);
});
