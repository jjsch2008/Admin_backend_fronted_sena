<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    public function index()
    {
        $profesores = Http::get('http://127.0.0.1:8000/api/teachers')->json();

        return view('teachers.index', compact('profesores'));
    }

    public function create()
    {
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();
        $centros = Http::get('http://127.0.0.1:8000/api/training-centers')->json();

        return view('teachers.create', compact('areas', 'centros'));
    }

    public function store(Request $request)
    {
        $respuesta = Http::post('http://127.0.0.1:8000/api/teachers', $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo crear el profesor.');
        }

        return redirect()->route('teachers.index')->with('exito', 'Profesor creado correctamente.');
    }

    public function edit($id)
    {
        $profesor = Http::get("http://127.0.0.1:8000/api/teachers/{$id}")->json();
        $areas = Http::get('http://127.0.0.1:8000/api/areas')->json();
        $centros = Http::get('http://127.0.0.1:8000/api/training-centers')->json();

        return view('teachers.edit', compact('profesor', 'areas', 'centros'));
    }

    public function update(Request $request, $id)
    {
        $respuesta = Http::put("http://127.0.0.1:8000/api/teachers/{$id}", $request->all());

        if ($respuesta->status() == 422) {
            return redirect()->back()->withErrors($respuesta['errors'])->withInput();
        }

        if ($respuesta->failed()) {
            return redirect()->back()->with('error', 'No se pudo actualizar el profesor.');
        }

        return redirect()->route('teachers.index')->with('exito', 'Profesor actualizado correctamente.');
    }

    public function destroy($id)
    {
        Http::delete("http://127.0.0.1:8000/api/teachers/{$id}");

        return redirect()->route('teachers.index')->with('exito', 'Profesor eliminado correctamente.');
    }
}
