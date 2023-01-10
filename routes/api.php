<?php

use App\Http\Controllers\API\TestApiController;
use App\Http\Controllers\API\UserController;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function () {
        return response()->json([
            'data' => User::all()
        ]);
    })->middleware('role:admin');
});


Route::post('login' , [UserController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/user', function(){
        return response()->json([
            'data' => User::all()
        ]);
    });
});

Route::middleware(['auth:sanctum', 'role:user'])->prefix('user')->group(function(){
   
});