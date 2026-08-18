<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();

        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        $centros = Http::get('http://127.0.0.1:8000/api/centros')->json();

        return view('areas.create', compact('centros'));
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/areas', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el área.');
        }

        return redirect()->route('areas.index')->with('exito', 'Área creada correctamente.');
    }

    public function edit($id)
    {
        $area = Http::get("http://127.0.0.1:8000/api/areas/{$id}")->json();
        $centros = Http::get('http://127.0.0.1:8000/api/centros')->json();

        return view('areas.edit', compact('area', 'centros'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/areas/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el área.');
        }

        return redirect()->route('areas.index')->with('exito', 'Área actualizada correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/areas/{$id}");

        return redirect()->route('areas.index')->with('exito', 'Área eliminada correctamente.');
    }
}
