<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AprendiceController extends Controller
{
    public function index()
    {
        $aprendices = Http::get('http://127.0.0.1:8000/api/aprendices')->json();

        return view('aprendices.index', compact('aprendices'));
    }

    public function create()
    {
        $cursos = Http::get('http://127.0.0.1:8000/api/cursos')->json();
        $computadores = Http::get('http://127.0.0.1:8000/api/computadores')->json();

        return view('aprendices.create', compact('cursos', 'computadores'));
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/aprendices', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el aprendiz.');
        }

        return redirect()->route('aprendices.index')->with('exito', 'Aprendiz creado correctamente.');
    }

    public function edit($id)
    {
        $aprendiz = Http::get("http://127.0.0.1:8000/api/aprendices/{$id}")->json();
        $cursos = Http::get('http://127.0.0.1:8000/api/cursos')->json();
        $computadores = Http::get('http://127.0.0.1:8000/api/computadores')->json();

        return view('aprendices.edit', compact('aprendiz', 'cursos', 'computadores'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/aprendices/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el aprendiz.');
        }

        return redirect()->route('aprendices.index')->with('exito', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/aprendices/{$id}");

        return redirect()->route('aprendices.index')->with('exito', 'Aprendiz eliminado correctamente.');
    }
}
