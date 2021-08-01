<?php

namespace App\Http\Controllers\Api;

use App\Models\items;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $items= Items::all();

        return response()->json([
            'success' => true,
    
            'message' => 'Daftar data item',
            'data' => $items
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
            'nama' => 'required|unique:items|max:255',
            'gambar' => 'required|unique:items|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $items = Items::create([
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'stok' => $request->stok
            

            ]);

            if($items)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Pelanggan berhasil di tambahkan',
                    'data' => $items
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Pelangggan gagal di tambahkan',
                'data' => $items
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
        $item = Items ::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data Pelanggan',
                    'data' => $item        
                       ], 200);
    }
    public function edit($id)
    {

                $item = Items::with('data')->Where('id', $id)->first();
                return response()->json([
                    'success' => true,
                    'message' => 'Detail data pelanggan',
                    'data' => $item
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

        $items = Items::find($id)->update([
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $item
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
        $item = Items::find($id)->delete();
        $cek = Items::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $item
        ], 200);
    }
}
