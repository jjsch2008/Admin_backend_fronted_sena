<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Area::all());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return response()->json(Area::create($datos), 201);
    }

    public function show(Area $area): JsonResponse
    {
        return response()->json($area->load('teachers', 'cursos'));
    }

    public function update(Request $request, Area $area): JsonResponse
    {
        $datos = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $area->update($datos);

        return response()->json($area);
    }

    public function destroy(Area $area): JsonResponse
    {
        $area->delete();

        return response()->json(['mensaje' => 'Área eliminada correctamente']);
    }
}
