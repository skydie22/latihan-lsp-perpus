<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->group(function() {
    Route::get('dashboard' , function(){
        $pemberitahuan = Pemberitahuan::where('status' , 'aktif')->get();
        $buku = Buku::all();
        return view('user.dashboard' , compact('pemberitahuan' , 'buku'));

    })->name('user.dashboard');

    Route::get('peminjaman' , function(){
        $peminjaman = Peminjaman::where('user_id' , Auth::user()->id)->get();
        return view('user.peminjaman' , compact('peminjaman'));
    })->name('user.peminjaman');

    Route::get('form_peminjaman' , function(){
        $buku = Buku::all();
        return view('user.form_peminjaman' , compact('buku'));
    })->name('user.form_peminjaman');

    Route::post('form_peminjaman' ,function(Request $request){
        $buku = Buku::all();
        $buku_id = $request->buku_id;

        return view('user.form_peminjaman' , compact('buku' , 'buku_id'));
    });

    Route::post('submit_peminjaman' , function(Request $request){
        $tanggal_peminjaman = $request->tanggal_peminjaman;
        $buku_id = $request->buku_id;
        $kondisi_buku_saat_dipinjam = $request->kondisi_buku_saat_dipinjam;
        $user_id = $request->user_id;


        $peminjaman = Peminjaman::create([
            "tanggal_peminjaman" => $tanggal_peminjaman,
            "buku_id" => $buku_id,
            "kondisi_buku_saat_dipinjam" => $kondisi_buku_saat_dipinjam,
            'user_id' => $user_id
        ]);

        if ($peminjaman) {
            return redirect()->route('user.peminjaman');
        }
        return redirect()->back();
    })->name('submit_peminjaman');

    Route::get('pengembalian' , function(){
        return view('user.pengembalian');
    })->name('user.pengembalian');

    Route::get('pesan' , function(){
        return view('user.pesan');
    })->name('user.pesan');

    Route::get('profil' , function(){
        return view('user.profil');
    })->name('user.profil');
});

Route::prefix('admin')->group(function() {
    Route::get('/dashboard' , function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
