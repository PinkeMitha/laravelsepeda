<?php

namespace App\Http\Controllers;

use App\Models\items;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::orderBy('id', 'desc')->paginate(3);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        //validate the request...

        $request->validate([
            'nama' => 'required|unique:items|max:255',
            'gambar' => 'required|unique:items|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $items = new Items;
      
        $items->nama = $request->nama;
        $items->gambar = $request->gambar;
        $items->harga = $request->harga;
        $items->stok = $request->stok;

        $items->save();

        return redirect('/');
    
    }
    public function show($id)
    {
        $item = Items::where('id', $id)->first();
        return view('items.show', ['item' => $item]);
    }
    
    public function edit($id)
    {
        $item = Items::where('id', $id)->first();
        return view('items.edit', ['item' => $item]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:items|max:255',
            'gambar' => 'required|unique:items|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Items::find($id)->update([
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect('/');
    }

    public function destory($id)
    {
        Items::find($id)->delete();
        return redirect('/');
    }
}