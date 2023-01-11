<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanApiController extends Controller
{
    public function index()
    {
        //klo ini datany masih mentah
        $peminjaman = Peminjaman::get();

    //biar rapih  datanya
        $data = [];
        foreach ($peminjaman as $key => $value) {
            $datas['buku'] = $value->buku->judul;
            $datas['user'] = $value->user->fullname;
            $datas['tgl_peminjaman'] = $value->tanggal_peminjaman;
            $datas['tgl_pengembalian'] = $value->tanggal_pengembalian;
            $datas['kondisi_buku_saat_dipinjam'] = $value->kondisi_buku_saat_dipinjam;
            $datas['kondisi_buku_saat_dikembalikan'] = $value->kondisi_buku_saat_dikembalikan;
            $datas['denda'] = $value->denda;
            $data[]=$datas;
        }
        return response()->json([
$data
        ]);
    }

    public function store(Request $request)
    {
            $peminjaman = Peminjaman::create([
                'user_id' => $request->user_id,
                'buku_id' => $request->buku_id,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam
            ]);

            return response()->json([
                'message' => 'berhasil meminjam buku',
                'data' => $peminjaman
            ],200);
    }

    // public function update(Request $request , $id)
    // {
    //     $peminjaman = Peminjaman::findOrFail($id);
    //     $peminjaman->update($request->all());

    //     return response()->json([
    //         'message' => 'berhasil mengedit peminjaman',
    //         'data' => $peminjaman
    //     ],200);
    // }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return response()->json([
            'message' => 'berhasil menghapus peminjaman',
            'data' => $peminjaman
        ],200);
    }
}
