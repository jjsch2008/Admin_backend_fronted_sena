<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Teacher::with('area', 'trainingCenter')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'area_id' => 'required|integer|exists:areas,id',
            'training_center_id' => 'required|integer|exists:training_centers,id',
        ]);

        return response()->json(Teacher::create($datos), 201);
    }

    public function show(Teacher $teacher): JsonResponse
    {
        return response()->json($teacher->load('area', 'trainingCenter', 'cursos'));
    }

    public function update(Request $request, Teacher $teacher): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'nullable|email|max:255',
            'area_id' => 'sometimes|required|integer|exists:areas,id',
            'training_center_id' => 'sometimes|required|integer|exists:training_centers,id',
        ]);

        $teacher->update($datos);

        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher): JsonResponse
    {
        $teacher->delete();

        return response()->json(['mensaje' => 'Profesor eliminado correctamente']);
    }
}
