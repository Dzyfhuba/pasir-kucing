<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('admin.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $cover = $request->file('cover');
        $cover_name = time() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('/storage/products'), $cover_name);

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'cover'=>$cover_name,
        ]);
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
         // update cover
         $cover_name = $product->cover;
         if ($request->hasFile('cover')) {
             // store cover
             $cover = $request->file('cover');
             $cover_name = time() . '.' . $cover->getClientOriginalExtension();
             $cover->move(public_path('/storage/products'), $cover_name);
         }
         // dd($request, $request->name, $request->description, $request->cover);
         $product->update([
             'name' => $request->name,
             'description' => $request->description,
             'cover' => $cover_name,
         ]);
         $product->save();
         return redirect()->route('admin.product.index')->with('success', 'product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        // remove cover file
        Storage::delete('public/products/' . $product->cover);
        return redirect()->route('admin.product.index');
    }
}
