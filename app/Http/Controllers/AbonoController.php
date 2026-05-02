<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Ninio;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index()
    {
        $abonos = Abono::with('ninio.persona')->get();
        return view('abonos.index', compact('abonos'));
    }

    public function create()
    {
        $ninios = Ninio::with('persona')->get();
        return view('abonos.create', compact('ninios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ninio' => 'required|exists:ninios,id_ninio',
            'cantidad' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        Abono::create($request->all());
        return redirect()->route('abonos.index')->with('success', 'Abono registrado exitosamente');
    }

    public function edit($id)
    {
        $abono = Abono::findOrFail($id);
        $ninios = Ninio::with('persona')->get();
        return view('abonos.edit', compact('abono', 'ninios'));
    }

    public function update(Request $request, $id)
    {
        $abono = Abono::findOrFail($id);

        $request->validate([
            'id_ninio' => 'required|exists:ninios,id_ninio',
            'cantidad' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $abono->update($request->all());
        return redirect()->route('abonos.index')->with('success', 'Abono actualizado exitosamente');
    }

    public function destroy($id)
    {
        $abono = Abono::findOrFail($id);
        $abono->delete();
        return redirect()->route('abonos.index')->with('success', 'Abono eliminado exitosamente');
    }
}