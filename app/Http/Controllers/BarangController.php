<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::latest()->get();

        return view('Barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png', 'max:100'],
            'name'  => ['required', 'unique:barangs'],
            'price_buy'  => ['required'],
            'price_sell'  => ['required'],
            'stock'  => ['required'],
        ]);

        $requestData = $request->all();

        $file =$request->file('image');
        $extension = $file->getClientOriginalExtension(); 
        $filename = time().'.' . $extension;
        $file->move(public_path('storage/img/'), $filename);
        $requestData['image'] = $filename;

        Barang::create($requestData);
        return redirect('barang')->with('success', 'Data berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('Barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        if($request->name != $barang->name){
            $this->validate($request, [
                'name' => ['required', 'unique:barangs'],
                'image' => ['image', 'mimes:jpg,png', 'max:100'],
                'price_buy'  => ['required'],
                'price_sell'  => ['required'],
                'stock'  => ['required'],
            ]);
        };

        $requestData = $request->all();

        if($request->hasFile('image') && $request->image != ''){
            $file = Barang::find($barang->id);
            unlink("storage/img/".$file->image);

            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('storage/img/'), $filename);
            $requestData['image'] = $filename;
        }

        $barang->update($request->all());
        $barang->update($requestData);

        return redirect('barang')->with('success', 'Data berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $file = Barang::find($barang->id);
        unlink("storage/img/".$file->image);
        Barang::where("id",$file->id)->delete();

        $barang->delete();

        return redirect('barang')->with('success', 'Data berhasil dihapus !');
    }
}
