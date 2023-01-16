<?php

use App\Http\Controllers\API\ApiBukuController;
use App\Http\Controllers\API\ApiIdentitasController;
use App\Http\Controllers\API\ApiKategoriController;
use App\Http\Controllers\API\ApiPemberitahuanController;
use App\Http\Controllers\API\ApiPeminjamanController;
use App\Http\Controllers\API\ApiPenerbitController;
use App\Http\Controllers\API\ApiPengembalianController;
use App\Http\Controllers\API\ApiPesanController;
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
    Route::post('/update/{id}' , [ApiBukuController::class , 'update']);
    Route::delete('/delete/{id} ' , [ApiBukuController::class , 'destroy']);
});

Route::prefix('peminjaman')->group(function (){
    Route::get('/' , [ApiPeminjamanController::class , 'index']);
    Route::post('/store' , [ApiPeminjamanController::class , 'store']);
    Route::post('/update/{id}' , [ApiPeminjamanController::class , 'update']);
    Route::delete('/delete/{id}' , [ApiPeminjamanController::class , 'destroy']);
});

Route::prefix('pengembalian')->group(function (){
    Route::get('/' , [ApiPengembalianController::class , 'index']);
    Route::post('/store' ,[ApiPengembalianController::class , 'store']);
});

 Route::prefix('penerbit')->group(function () {
    Route::get('/' , [ApiPenerbitController::class , 'index']);
    Route::post('/store' , [ApiPenerbitController::class , 'store' ]);
    Route::post('/update/{id}' , [ApiPenerbitController::class , 'update']);
    Route::delete('/delete/{id}' , [ApiPenerbitController::class, 'destroy']);
});

Route::prefix('kategori')->group(function () {
    Route::get('/' , [ApiKategoriController::class , 'index']);
    Route::post('/store' , [ApiKategoriController::class , 'store']);
    Route::post('/update/{id}' , [ApiKategoriController::class , 'update']);
    Route::delete('/delete/{id}' , [ApiKategoriController::class ,  'destroy' ]);
});

Route::prefix('pesan')->group(function () {
    Route::get('/' , [ApiPesanController::class , 'index']);
    Route::post('/store' , [ApiPesanController::class , 'store']);
    Route::post('/update/{id}' , [ApiPesanController::class , 'update']);
    Route::delete('/delete/{id}' , [ApiPesanController::class , 'destroy']);
});

Route::prefix('identitas')->group(function () {
    Route::get('/' , [ApiIdentitasController::class , 'index']);
    Route::post('/update/{id}' , [ApiIdentitasController::class , 'update']);
});

// Route::prefix('admin')->group(function () {
    
    // });

    Route::prefix('pemberitahuan' )->group(function () {
        Route::get('/' , [ApiPemberitahuanController::class , 'index']);
    });
    
    Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/user', function(){
        return response()->json([
            'data' => User::all()
        ]);
    });
    Route::get('/' , [UserController::class , 'get_admin']);
    Route::post('/store' , [UserController::class , 'storeAdmin'] );
    Route::post('/update/{id}' , [UserController::class , 'updateAdmin'] );
    Route::delete('/delete/{id}' , [UserController::class , 'destroyAdmin'] );
    Route::post('/anggota/add', [UserController::class , 'storeAnggota']);
});

Route::get('pengguna' , [UserController::class , 'getAnggota']);
Route::post('pengguna/update/{id}' , [UserController::class , 'updateAnggota']);
