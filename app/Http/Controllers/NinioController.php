<?php

namespace App\Http\Controllers;

use App\Models\Ninio;
use Illuminate\Http\Request;
use App\Models\Persona; //Se importan los modelos relacionados
use App\Models\Centro;

class NinioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Carga las relaciones
        $ninios = Ninio::with('persona','centro')->get();
        return view("ninios.index" , compact("ninios"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Envia listados para el select en el formulario
        $personas = Persona::all();
        $centros = Centro::all();

        return view("ninios.create", compact("personas","centros"));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:ninios,matricula',  // + Añadir unique
            'id_persona' => 'required|exists:personas,id_persona',  // + Verificar que existe
            'id_centro' => 'required|exists:centros,id_centro',     // + Verificar que existe
            'fecha_ingreso' => 'required|date',  // + Validar formato fecha
        ]);
        
        Ninio::create($request->all());
        return redirect()->route("ninios.index")->with('success', 'Niño creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
        public function show(Ninio $ninio)
    {
        // ✅ MEJORADO: Cargar relaciones para mostrar datos completos
        $ninio->load(['persona', 'centro']);
        return view("ninios.show", compact("ninio"));
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(Ninio $ninio)
    {
        // ✅ MEJORADO: Cargar relaciones y listados para selects
        $ninio->load(['persona', 'centro']);
        $personas = Persona::all();
        $centros = Centro::all();
        
        return view("ninios.edit", compact("ninio", "personas", "centros"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ninio $ninio)
    {
        $request->validate([
            'matricula' => 'required|unique:ninios,matricula,' . $ninio->id_ninio . ',id_ninio',  // Ignorar su propio registro
            'id_persona' => 'required|exists:personas,id_persona',
            'id_centro' => 'required|exists:centros,id_centro',
            'fecha_ingreso' => 'required|date',
        ]);
        
        $ninio->update($request->all());
        return redirect()->route("ninios.index")->with('success', 'Niño actualizado exitosamente');
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