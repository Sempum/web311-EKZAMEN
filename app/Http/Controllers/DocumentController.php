<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Product;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.documents.index',[
            'documents' => Document::all()->sortBy('name'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.documents.create', [
            'products' => Product::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'product_id' => 'required',
            'description' => 'nullable|min:6'
        ]);

        $document = Document::create($request->all());
        $document->uploadDocs($request->file('document'));

        return redirect()->route('documents.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('layouts.admin.documents.edit', [
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $document->update($request->all());

        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->removeDoc();
        $document->delete();
        return back();
    }

    /**
     * view page for users who wants to add document
     */

    public function createMain()
    {
        return view('layouts.main_site.documentCreate', [
            'products' => Product::all()->sortBy('name')
        ]);
    }

    /**
     * store users documents to database
     */

    public function storeMain(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'product_id' => 'required',
            'description' => 'nullable|min:6'
        ]);

        $ext = $request->file('document')->extension();
        $availableExtensions = ['pdf', 'img'];

        if ( in_array($ext, $availableExtensions)) {
            $document = Document::create($request->all());
            $document->uploadDocs($request->file('document'));
        } else{
            return back()->with('error', 'Не правильный тип файла! Допустимые разширения pdf и img');
        };

        return back()->with('success', 'Документация была добавления. Она появится после проверки администрацией проекта. Спасибо!');
    }

    /**
     * Approve users document to view on main site
     */

    public function approveDoc(Document $document, Request $request)
    {
        $document->approved = 1;
        $document->update($request->all());

        return back();
    }
}
