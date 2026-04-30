<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Persona;
use App\Models\Parentesco;
use App\Models\Ninio;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familiares = Familiar::with(['persona', 'parentesco', 'ninio.persona'])->get();
        return view("familiares.index", compact("familiares"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas = Persona::all();
        $parentescos = Parentesco::all();
        $ninios = Ninio::with('persona')->get();
        
        return view("familiares.create", compact('personas', 'parentescos', 'ninios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'telefono' => 'required|string|max:20',
            'dni' => 'required|string|max:20|unique:familiares,dni',
            'direccion' => 'required|string|max:255',
            'id_parentesco' => 'required|exists:parentescos,id_parentesco',
            'id_ninio' => 'required|exists:ninios,id_ninio',
        ]);
        
        Familiar::create($request->all());
        return redirect()->route("familiares.index")->with('success', 'Familiar creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $familiar = Familiar::with(['persona', 'parentesco', 'ninio.persona'])->find($id);
        return view("familiares.show", compact("familiar"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscar el familiar manualmente
        $familiar = Familiar::with(['persona', 'parentesco', 'ninio'])->find($id);
        
        // Si no existe, redirigir con error
        if(!$familiar) {
            return redirect()->route("familiares.index")->with('error', 'Familiar no encontrado');
        }
        
        $personas = Persona::all();
        $parentescos = Parentesco::all();
        $ninios = Ninio::with('persona')->get();
        
        return view("familiares.edit", compact("familiar", "personas", "parentescos", "ninios"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $familiar = Familiar::find($id);
        
        if(!$familiar) {
            return redirect()->route("familiares.index")->with('error', 'Familiar no encontrado');
        }
        
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'telefono' => 'required|string|max:20',
            'dni' => 'required|string|max:20|unique:familiares,dni,' . $id . ',id_familiar',
            'direccion' => 'required|string|max:255',
            'id_parentesco' => 'required|exists:parentescos,id_parentesco',
            'id_ninio' => 'required|exists:ninios,id_ninio',
        ]);
        
        $familiar->update($request->all());
        return redirect()->route("familiares.index")->with('success', 'Familiar actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $familiar = Familiar::find($id);
        
        if(!$familiar) {
            return redirect()->route("familiares.index")->with('error', 'Familiar no encontrado');
        }
        
        // Usar forceDelete si tienes SoftDeletes, o delete si no
        $familiar->forceDelete(); // ← Eliminación física inmediata
        
        return redirect()->route("familiares.index")->with('success', 'Familiar eliminado exitosamente');
    }
}