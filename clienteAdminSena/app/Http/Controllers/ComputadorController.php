<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputadorController extends Controller
{
    public function index()
    {
        $computadores = Http::get('http://127.0.0.1:8000/api/computadores')->json();

        return view('computadores.index', compact('computadores'));
    }

    public function create()
    {
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();

        return view('computadores.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/computadores', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el computador.');
        }

        return redirect()->route('computadores.index')->with('exito', 'Computador creado correctamente.');
    }

    public function edit($id)
    {
        $computador = Http::get("http://127.0.0.1:8000/api/computadores/{$id}")->json();
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();

        return view('computadores.edit', compact('computador', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/computadores/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el computador.');
        }

        return redirect()->route('computadores.index')->with('exito', 'Computador actualizado correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/computadores/{$id}");

        return redirect()->route('computadores.index')->with('exito', 'Computador eliminado correctamente.');
    }
}
