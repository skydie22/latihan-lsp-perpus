<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitApiController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();

        return response()->json([
            'data' => $penerbit
        ]);

    }

    public function store(Request $request)
    {
        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return response()->json([
            'msg' => 'berhasil menambah data',
            'data' => $penerbit
        ]);
        
    }

    public function update(Request $request , $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        return response()->json([
            'message' => $penerbit
        ]);
    }   

}
