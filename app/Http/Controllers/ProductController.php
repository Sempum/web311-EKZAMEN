<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('layouts.admin.products.index', [
            'products' => Product::all()->sortBy('name'),
            'categories' => Category::all()->sortBy('name'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.products.create',[
            'categories' => Category::all()->sortBy('name'),
            'documents' => Document::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'nullable|min:6'
        ]);

        $product = Product::create($request->all());
        $product->uploadImage($request->file('image'));

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('layouts.admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()->sortBy('name'),
            'documents' => Document::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'nullable|min:6'
        ]);

        $product->update($request->all());
        $product->uploadImage($request->file('image'));

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->remove();
        return back();
    }

    public function removeImage(Product $product)
    {
        $product->removeImage();
        return back();
    }
}
