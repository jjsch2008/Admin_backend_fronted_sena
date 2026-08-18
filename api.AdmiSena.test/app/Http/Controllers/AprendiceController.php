<?php

namespace App\Http\Controllers;

use App\Models\Aprendice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AprendiceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Aprendice::with('curso', 'computador')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'cell_number' => 'nullable|string|max:255',
            'curso_id' => 'required|integer|exists:cursos,id',
            'computer_id' => 'nullable|integer|exists:computadores,id',
        ]);

        return response()->json(Aprendice::create($datos), 201);
    }

    public function show(Aprendice $aprendice): JsonResponse
    {
        return response()->json($aprendice->load('curso', 'computador'));
    }

    public function update(Request $request, Aprendice $aprendice): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'nullable|email|max:255',
            'cell_number' => 'nullable|string|max:255',
            'curso_id' => 'sometimes|required|integer|exists:cursos,id',
            'computer_id' => 'nullable|integer|exists:computadores,id',
        ]);

        $aprendice->update($datos);

        return response()->json($aprendice);
    }

    public function destroy(Aprendice $aprendice): JsonResponse
    {
        $aprendice->delete();

        return response()->json(['mensaje' => 'Aprendiz eliminado correctamente']);
    }
}
