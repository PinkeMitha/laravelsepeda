<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\items;
use App\Models\kategoris;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kategoris = Kategoris::get();

        return response()->json([
            'success'   => true,
            'message'   => 'Daftar Data kategori',
            'data'      => $kategori
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris|max:255',
            'description' => 'required|unique:kategoris|max:255',
        ]);
    
        $kategori = Kategoris::create([
            'nama' => $request->nama,
            'description' => $request->description
    
        ]);
    
        if($kategori){
            return response()->json([
                'success'   => true,
                'message'   => 'Kategori Berhasil Ditambahkan',
                'data'      => $kategori
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Kategori Gagal Ditambahkan',
                'data'      => $kategori
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategoris::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kategori',
            'data' => $kategori
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $kategori = Kategoris::find($id)->update([
            'nama' => $request->nama,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => "Data Diubah",
            'data' => $kategori
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategoris::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $kategori
        ], 200);
    }
    
}
