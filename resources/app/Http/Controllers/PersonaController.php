<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $personas = persona::all();
        return view("personas.index" , compact("personas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("personas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validamos PRIMERO (añadí el apellido_materno que faltaba en la segunda validación)
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'fecha_nacimiento' => 'required|date',
        ]);

        // 2. Creamos después de validar
        Persona::create($request->all());

        // 3. Redireccionamos con mensaje de éxito
        return redirect()->route("personas.index")->with('success', '¡Persona creada con éxito!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $persona = Persona::findOrFail($id); // Busca a la persona o lanza error 404
    return view('personas.edit', compact('persona')); // Te manda a la vista que crearemos
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // 1. Validamos los datos nuevos
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'fecha_nacimiento' => 'required|date',
        ]);

        // 2. Buscamos y actualizamos
        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', '¡Registro actualizado!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return redirect()->route("personas.index");
    }
}