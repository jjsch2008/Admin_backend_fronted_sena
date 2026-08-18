<?php

namespace App\Http\Controllers;

use App\Models\Computadore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ComputadoreController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Computadore::all());
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'marca' => 'required|string|max:255',
            'numero' => 'required|string|max:255|unique:computadores,numero',
        ]);

        return response()->json(Computadore::create($datos), 201);
    }

    public function show(Computadore $computadore): JsonResponse
    {
        return response()->json($computadore->load('aprendices'));
    }

    public function update(Request $request, Computadore $computadore): JsonResponse
    {
        $datos = $request->validate([
            'marca' => 'sometimes|required|string|max:255',
            'numero' => 'sometimes|required|string|max:255|unique:computadores,numero,'.$computadore->id,
        ]);

        $computadore->update($datos);

        return response()->json($computadore);
    }

    public function destroy(Computadore $computadore): JsonResponse
    {
        $computadore->delete();

        return response()->json(['mensaje' => 'Computador eliminado correctamente']);
    }
}
