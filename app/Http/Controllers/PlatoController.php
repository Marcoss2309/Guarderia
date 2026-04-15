<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $platos = Plato::all();
        return view("platos.index", compact("platos"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("platos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            
        ]);

        Plato::create($request->all());
        return redirect()->route("platos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plato $platos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plato $platos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plato $platos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plato $plato)
    {
        //
         $plato->delete();
        return redirect()->route("platos.index");

    }
}