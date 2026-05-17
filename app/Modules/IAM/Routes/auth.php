<?php


use App\Modules\IAM\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::post('login', [AuthController::class, 'login']);
