<?php

use App\Http\Controllers\Api\OdtController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {


    Route::resource('odt', OdtController::class);


    Route::get('/test', function () {
        return view('welcome');
    });
});

// Route::group(['prefix' => 'auth'], function ($router) {
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('register', [AuthController::class, 'register']);
// });

// Route::middleware(['auth:api'])->group(function () {
//     Route::post('refresh', [AuthController::class, 'refresh']);
//     Route::post('me', [AuthController::class, 'me']);
//     Route::post('logout', [AuthController::class, 'logout']);
// });
