<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $centros = Http::get('http://127.0.0.1:8000/api/training-centers')->json();

        return view('training-centers.index', compact('centros'));
    }

    public function create()
    {
        return view('training-centers.create');
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/training-centers', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el centro.');
        }

        return redirect()->route('training-centers.index')->with('exito', 'Centro creado correctamente.');
    }

    public function edit($id)
    {
        $centro = Http::get("http://127.0.0.1:8000/api/training-centers/{$id}")->json();

        return view('training-centers.edit', compact('centro'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/training-centers/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el centro.');
        }

        return redirect()->route('training-centers.index')->with('exito', 'Centro actualizado correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/training-centers/{$id}");

        return redirect()->route('training-centers.index')->with('exito', 'Centro eliminado correctamente.');
    }
}
