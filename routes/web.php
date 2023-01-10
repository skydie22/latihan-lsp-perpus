<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // $tanggal_peminjaman = $request->tanggal_peminjaman;
        // $buku_id = $request->buku_id;
        // $kondisi_buku_saat_dipinjam = $request->kondisi_buku_saat_dipinjam;
        // $user_id = $request->user_id;


        // $peminjaman = Peminjaman::create([
        //     "tanggal_peminjaman" => $tanggal_peminjaman,
        //     "buku_id" => $buku_id,
        //     "kondisi_buku_saat_dipinjam" => $kondisi_buku_saat_dipinjam,
        //     'user_id' => $user_id
        // ]);

        //berlaku kalau nama name di input type dan field di db sama
        $peminjaman = Peminjaman::create($request->all());

        if ($peminjaman) {
            return redirect()->route('user.peminjaman')
            ->with('status' , 'success')->with('message' , 'berhasil menambah data');
        }
        return redirect()->back()->with('status', 'danger')->with('message' , 'gagal menambah data');
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

    Route::put('profil' , function(Request $request){
        $id = Auth::user()->id;
     
        $imageName = time().'.'.$request->foto->extension();

        $request->foto->move(public_path('img'),$imageName);
        
        $user =  User::find($id)->update($request->all());
       if($request->password != null){

           $user2 = User::find($id)->update([
            'password' => Hash::make($request->password)
           ]);
       }
       
       $user3 = User::find($id)->update([
        'foto' => $imageName
       ]);

       if ($user && $user2 && $user3) {
        return redirect()->back()->with('status' , 'success')->with('message' , 'berhasil mengupdate profil');
       }
       return redirect()->back()->with('status' , 'danger')->with('message' , 'berhasil mengupdate profil');

    })->name('user.profil.update');
});

Route::prefix('admin')->group(function() {
    Route::get('/dashboard' , function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
