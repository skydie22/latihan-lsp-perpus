<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriApiController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return response()->json([
            'data' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create($request->all());

        return response()->json([
            'msg' => 'berhasil membuat data',
            'data' => $kategori
        ]); 
    }

    public function update(Request $request , $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $kategori], 200);   
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return response()->json([
            'msg' => 'berhasil menghapus data',
            'data' => $kategori
        ]); 
    }
}
