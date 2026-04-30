<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with(['plato', 'ingrediente'])->get();
        return view("menus.index", compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platos = Plato::all();
        $ingredientes = Ingrediente::all();
        
        return view("menus.create", compact('platos', 'ingredientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_plato' => 'required|exists:platos,id_plato',
            'id_ingrediente' => 'required|exists:ingredientes,id_ingrediente',
        ]);
        
        Menu::create($request->all());
        return redirect()->route("menus.index")->with('success', 'Menu creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menu->load(['plato', 'ingrediente']);
        return view("menus.show", compact("menu"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $platos = Plato::all();
        $ingredientes = Ingrediente::all();
        
        return view("menus.edit", compact("menu", "platos", "ingredientes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'id_plato' => 'required|exists:platos,id_plato',
            'id_ingrediente' => 'required|exists:ingredientes,id_ingrediente',
        ]);
        
        $menu->update($request->all());
        return redirect()->route("menus.index")->with('success', 'Menu actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->forceDelete(); // o $menu->delete() si quieres SoftDelete
        return redirect()->route("menus.index")->with('success', 'Menu eliminado exitosamente');
    }
}