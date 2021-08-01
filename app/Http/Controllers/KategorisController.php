<?php

namespace App\Http\Controllers;
use App\Models\kategoris;
use App\Models\items;
use Illuminate\Http\Request;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategoris::orderBy('id', 'desc')->paginate(3);
        return view('kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the request...

        $request->validate([
            'nama' => 'required|unique:kategoris|max:255',
            'description' => 'required|unique:kategoris|max:255',
           
        ]);

        $kategoris = new Kategoris;
      
        $kategoris->nama = $request->nama;
        $kategoris->description = $request->description;

        $kategoris->save();

        return redirect('/');
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
        return view('kategoris.show', ['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategoris::where('id', $id)->first();
        return view('kategoris.edit', ['kategori' => $kategori]);
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
        $request->validate([
            'nama' => 'required|unique:kategoris|max:255',
            'description' => 'required|unique:kategoris|max:255',
            
        ]);

        Kategoris::find($id)->update([
            'nama' => $request->nama,
            'description' => $request->description
            
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoris::find($id)->delete();
        return redirect('/');
    }

    public function additem($id)
    {
        $item = Items::where('kategoris_id', '=', 0)->get();
        $kategori = Kategoris::where('id', $id)->first();
        return view('kategoris.additem', ['kategori' => $kategori, 'item' => $item]);
    }

    public function updateadditem(Request $request, $id)
    {
        $item = items::where('id', $request->item_id)->first();
        items::find($item->id)->update([
            'kategoris_id' => $id
        ]);
        return redirect('/kategoris/additem/' . $id);
    }

    public function deleteadditem(Request $request, $id)
    {
        //dd($id);
        Items::find($id)->update([
            'kategoris_id' => 0
        ]);
        return redirect('/kategoris');
    }
}
