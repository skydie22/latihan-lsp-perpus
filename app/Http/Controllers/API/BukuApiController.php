<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return response()->json([
            'data' => $buku
        ]);
    }

    public function storeBuku(Request $request)
    {
        $kategori_id = $request->kategori_id;
        $penerbit_id = $request->penerbit_id;
      
        $buku = Buku::create([
            'judul' => $request->judul,
            'kategori_id' => $kategori_id,
            'penerbit_id' => $penerbit_id,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak
        ]);

        return response()->json([
            'data' => ' buku berhasil di tambahkan'
        ]); 

    }

    public function update(Request $request , $id)
    {
        
    }

    public function destroy($id)
    {
        $buku  = Buku::findOrFail($id);
        $buku->delete();

        return response()->json([
            'message' => 'buku berhasil di hapus'
        ]);
    }


}
