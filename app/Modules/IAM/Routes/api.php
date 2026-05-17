<?php

use App\Modules\IAM\Http\Controllers\Api\AuthController;
use App\Modules\IAM\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IAM Routes
|--------------------------------------------------------------------------
*/
Route::post('users', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'index']);
