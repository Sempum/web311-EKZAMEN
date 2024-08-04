<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.sectors.index', [
            'sectors' => Sector::all()->sortBy('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Sector::create($request->all());

        return redirect()->route('sector.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('layouts.admin.sectors.edit', [
            'sector' => $sector
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {

        $sector->update($request->all());

        return redirect()->route('sector.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return back();
    }
}
