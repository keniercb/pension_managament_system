<?php

use App\Modules\Entity\Http\Controllers\Api\OfficeController;
use App\Modules\Entity\Http\Controllers\Api\OfficeTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Entity Routes
|--------------------------------------------------------------------------
*/
Route::get('office-types', [OfficeTypeController::class, 'index']);

Route::post('offices', [OfficeController::class, 'store']);
Route::get('offices', [OfficeController::class, 'index']);
