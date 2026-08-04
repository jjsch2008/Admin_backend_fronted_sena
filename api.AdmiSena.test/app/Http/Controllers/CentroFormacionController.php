<?php

namespace App\Http\Controllers;

use App\Models\CentroFormacion;
use Illuminate\Http\Request;

class CentroFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CentroFormacion::all();
    }

    public function store(Request $request)
    {
        $guardar=CentroFormacion::created($request->all());
        return response()->json($guardar);
    }

    /**
     * Display the specified resource.
     */
    public function show(CentroFormacion $centroFormacion)
    {
        return response()->json($centroFormacion);
    }

   
    public function update(Request $request, CentroFormacion $centroFormacion)
    {
        return $centroFormacion->update($request->all());
    }

  
    public function destroy(CentroFormacion $centroFormacion)
    {
        return $centroFormacion->delete();
;    }
}
