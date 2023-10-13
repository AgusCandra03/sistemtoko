<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $product = Product::latest()->where('name', 'LIKE', '%'.$request->search.'%')->paginate(3)->withQueryString();
        } else {
            $product = Product::latest()->paginate(10);
        }

        
        return view('Product.index', ['product' => $product], compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png', 'max:100'],
            'name'  => ['required', 'unique:products'],
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

        Product::create($requestData);
        return redirect('product')->with('success', 'Product berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if($request->name != $product->name){
            $this->validate($request, [
                'name' => ['required', 'unique:products'],
                'image' => ['image', 'mimes:jpg,png', 'max:100'],
                'price_buy'  => ['required'],
                'price_sell'  => ['required'],
                'stock'  => ['required'],
            ]);
        };

        $requestData = $request->all();

        if($request->hasFile('image') && $request->image != ''){
            $file = Product::find($product->id);
            unlink("storage/img/".$file->image);

            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.' . $extension;
            $file->move(public_path('storage/img/'), $filename);
            $requestData['image'] = $filename;
        }

        $product->update($request->all());
        $product->update($requestData);

        return redirect('product')->with('success', 'Product berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $file = Product::find($product->id);
        unlink("storage/img/".$file->image);
        Product::where("id",$file->id)->delete();

        $product->delete();

        return redirect('product')->with('success', 'Data berhasil dihapus !');
    }
}
