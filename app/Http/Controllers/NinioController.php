<?php

namespace App\Http\Controllers;

use App\Models\Ninio;
use Illuminate\Http\Request;

class NinioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ninios = Ninio::all();
        return view("ninios.index" , compact("ninios"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view("ninios.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'matricula' => 'required',
            'id_persona' => 'required',
            'id_centro' => 'required',
            'fecha_ingreso' => 'required',
        ]);
        //
        Ninio::create($request->all());
        return redirect()->route("ninios.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Ninio $ninio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ninio $ninio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ninio $ninio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ninio $ninio)
    {
        //
         $ninio->delete();
        return redirect()->route("ninios.index");
    }
}