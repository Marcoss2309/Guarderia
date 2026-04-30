<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $ingredientes = Ingrediente::all();
        return view("ingredientes.index" , compact("ingredientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view("ingredientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
        ]);
        Ingrediente::create($request->all());
        return redirect()->route("ingredientes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingrediente $ingrediente)
    {
        return view ("ingredientes.edit",compact("ingrediente"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request -> validate ([
            'nombre' => 'required', 
        ]);
        $ingrediente->update($request->all());
        return redirect()->route("ingredientes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingrediente)
    {
        //
        $ingrediente->delete();
        return redirect()->route("ingredientes.index");
    }
}