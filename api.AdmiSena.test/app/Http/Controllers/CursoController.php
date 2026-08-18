<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Curso::with('area', 'trainingCenter', 'teachers')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'course_number' => 'required|string|max:255|unique:cursos,course_number',
            'day' => 'required|string|max:255',
            'area_id' => 'required|integer|exists:areas,id',
            'training_center_id' => 'required|integer|exists:training_centers,id',
        ]);

        $curso = Curso::create($datos);
        $curso->teachers()->sync($request->input('teacher_ids', []));

        return response()->json($curso->load('teachers'), 201);
    }

    public function show(Curso $curso): JsonResponse
    {
        return response()->json($curso->load('area', 'trainingCenter', 'teachers', 'aprendices'));
    }

    public function update(Request $request, Curso $curso): JsonResponse
    {
        $datos = $request->validate([
            'course_number' => 'sometimes|required|string|max:255|unique:cursos,course_number,'.$curso->id,
            'day' => 'sometimes|required|string|max:255',
            'area_id' => 'sometimes|required|integer|exists:areas,id',
            'training_center_id' => 'sometimes|required|integer|exists:training_centers,id',
        ]);

        $curso->update($datos);
        $curso->teachers()->sync($request->input('teacher_ids', []));

        return response()->json($curso->load('teachers'));
    }

    public function destroy(Curso $curso): JsonResponse
    {
        $curso->delete();

        return response()->json(['mensaje' => 'Curso eliminado correctamente']);
    }
}
