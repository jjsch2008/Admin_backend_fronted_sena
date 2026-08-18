<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Http::get('http://127.0.0.1:8000/api/cursos')->json();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();
        $centros = Http::get('http://127.0.0.1:8000/api/training-centers')->json();
        $profesores = Http::get('http://127.0.0.1:8000/api/teachers')->json();

        return view('cursos.create', compact('areas', 'centros', 'profesores'));
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/cursos', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el curso.');
        }

        return redirect()->route('cursos.index')->with('exito', 'Curso creado correctamente.');
    }

    public function edit($id)
    {
        $curso = Http::get("http://127.0.0.1:8000/api/cursos/{$id}")->json();
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();
        $centros = Http::get('http://127.0.0.1:8000/api/training-centers')->json();
        $profesores = Http::get('http://127.0.0.1:8000/api/teachers')->json();

        return view('cursos.edit', compact('curso', 'areas', 'centros', 'profesores'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/cursos/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el curso.');
        }

        return redirect()->route('cursos.index')->with('exito', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/cursos/{$id}");

        return redirect()->route('cursos.index')->with('exito', 'Curso eliminado correctamente.');
    }
}
