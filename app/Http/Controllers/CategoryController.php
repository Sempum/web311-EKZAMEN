<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sector;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.categories.index', [
            'categories' => Category::all()->sortBy('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.categories.create', [
            'sectors' => Sector::all()->sortby('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'sector_id'=> 'required'
        ]);

        $category = Category::create($request->all());
        $category->uploadImage($request->file('icon'));

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('layouts.admin.categories.edit', [
            'category' => $category,
            'sectors' => Sector::all()->sortBy('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
            'sector_id'=> 'required'
        ]);

        $category->update($request->all());
        $category->uploadImage($request->file('icon'));

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function removeImage(Category $category)
    {
        $category->removeImage();
        return back();
    }
}
