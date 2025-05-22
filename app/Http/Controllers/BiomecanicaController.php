<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BiomecanicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $formulas = DB::table('formulas_biomecanicas')->get();
        return view("biomecanica.index", compact('formulas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parametros' => 'required|json',
            'esPlantilla' => 'nullable|boolean',
        ]);

        // Obtener el id más alto de la tabla (último insertado)
        $ultimoId = DB::table('formulas_biomecanicas')->max('id');

        // Si hay registros, elimina el de id más alto, si no, intenta eliminar el id 1
        if ($ultimoId) {
            DB::table('formulas_biomecanicas')->where('id', $ultimoId)->delete();
        } else {
            DB::table('formulas_biomecanicas')->where('id', 1)->delete();
        }

        // Insertar el nuevo registro
        $id = DB::table('formulas_biomecanicas')->insertGetId([
            'id' => $ultimoId ? $ultimoId : 1,
            'parametros' => $validated['parametros'],
            'esPlantilla' => $validated['esPlantilla'] ?? false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'parametros' => 'required|json',
        'esPlantilla' => 'nullable|boolean',
        ]);

    $updated = DB::table('formulas_biomecanicas')
        ->where('id', $id)
        ->update([
            'parametros' => $validated['parametros'],
            'updated_at' => now(),
        ]);

    return response()->json(['success' => $updated > 0]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
