<?php

use App\Http\Controllers\API\ApiBukuController;
use App\Http\Controllers\API\BukuApiController;
use App\Http\Controllers\API\kategoriApiController;
use App\Http\Controllers\API\PeminjamanApiController;
use App\Http\Controllers\API\PenerbitApiController;
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


Route::prefix('buku')->group(function () {
    
    Route::get('/' , [ApiBukuController::class , 'index']);
    Route::post('/store' , [ApiBukuController::class , 'store']);
    Route::put('/update/{id}' , [ApiBukuController::class , 'update']);
    Route::delete('delete/{id} ' , [ApiBukuController::class , 'destroy']);
});

Route::get('peminjaman' , [PeminjamanApiController::class , 'index']);
Route::post('peminjaman' , [PeminjamanApiController::class , 'store']);
// Route::put('peminjaman/{id}' , [PeminjamanApiController::class , 'update']);
Route::delete('peminjaman/{id}' , [PeminjamanApiController::class , 'destroy']);

 Route::prefix('penerbit')->group(function () {
    Route::get('/' , [PenerbitApiController::class , 'index']);
    Route::post('/store' , [PenerbitApiController::class , 'store' ]);
    Route::put('/update/{id}' , [PenerbitApiController::class , 'update']);
    Route::delete('/delete/{id}' , [PenerbitApiController::class] , 'destroy');
 });

 Route::prefix('kategori')->group(function () {
    Route::get('/' , [kategoriApiController::class , 'index']);
    Route::post('/store' , [kategoriApiController::class , 'store']);
    Route::put('/update/{id}' , [kategoriApiController::class , 'update']);
    Route::delete('/delete/{id}' , [kategoriApiController::class ,  'destroy' ]);
 });

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/user', function(){
        return response()->json([
            'data' => User::all()
        ]);
    });
});

Route::middleware(['auth:sanctum', 'role:user'])->prefix('user')->group(function(){
   
});