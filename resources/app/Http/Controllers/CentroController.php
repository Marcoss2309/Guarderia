<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $centros = Centro::all();
        return view("centros.index", compact("centros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("centros.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'direccion' => 'required',
            
        ]);
        Centro::create($request->all());
        return redirect()->route("centros.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centro $centro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centro $centro)
    {
        //
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //
        $centro->delete();
        return redirect()->route("centros.index");
    }
}