<?php

namespace App\Http\Controllers;

use App\Models\TrainingCenter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(TrainingCenter::all());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        return response()->json(TrainingCenter::create($datos), 201);
    }

    public function show(TrainingCenter $trainingCenter): JsonResponse
    {
        return response()->json($trainingCenter->load('teachers', 'cursos'));
    }

    public function update(Request $request, TrainingCenter $trainingCenter): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
        ]);

        $trainingCenter->update($datos);

        return response()->json($trainingCenter);
    }

    public function destroy(TrainingCenter $trainingCenter): JsonResponse
    {
        $trainingCenter->delete();

        return response()->json(['mensaje' => 'Centro de formación eliminado correctamente']);
    }
}
