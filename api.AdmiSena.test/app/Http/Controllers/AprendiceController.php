<?php

namespace App\Http\Controllers;

use App\Models\Aprendice;
use Illuminate\Http\Request;

class AprendiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Aprendice::all();
    }


    public function store(Request $request)
    {
        return Aprendice::created($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Aprendice $aprendice)
    {
        return response()->json($aprendice);
    }

  
    public function update(Request $request, Aprendice $aprendice)
    {
        $aprendice->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aprendice $aprendice)
    {
        return $aprendice->delete(); 
    }
}
