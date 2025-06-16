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
        $formulas = DB::table('formulas_biomecanicas_base')->get();
        return view("biomecanica.index2", compact('formulas'));
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
            'id_informe'=> 'required|integer',
            'formula_sin_variables' => 'required|string',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'formula_con_variables' => 'required|string',
            'campo_destino' => 'required|string',
            'campos_variables' => 'required|json',
            'campo_destino_alias' => 'required|string',
            'parametros' => 'required|json',
            'esPlantilla' => 'nullable|boolean',
        ]);

        // Obtener el id más alto de la tabla (último insertado)
        $ultimoId = DB::table('formulas_biomecanicas')->max('id');
        $yaExiste = DB::table('formulas_biomecanicas')
            ->where('id_informe', $validated['id_informe'])
            ->where('campo_destino', $validated['campo_destino'])
            ->exists();

        if ($yaExiste) {
            return response()->json(["message" => 'Ya existe una fórmula asignada a '. $validated['campo_destino_alias']],422);
        }
        // Si hay registros, elimina el de id más alto, si no, intenta eliminar el id 1
        // if ($ultimoId) {
        //     DB::table('formulas_biomecanicas')->where('id', $ultimoId)->delete();
        // } else {
        //     DB::table('formulas_biomecanicas')->where('id', 1)->delete();
        // }

        // Insertar el nuevo registro
        $id = DB::table('formulas_biomecanicas')->insertGetId([
            //'id' => $ultimoId ? $ultimoId : 1,
            'parametros' => $validated['parametros'],
            'id_informe' => $validated['id_informe'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'formula_sin_variables' => $validated['formula_sin_variables'],
            'formula_con_variables' => $validated['formula_con_variables'],
            'campo_destino' => $validated['campo_destino'],
            'campos_variables' => $validated['campos_variables'],
            'campo_destino_alias' => $validated['campo_destino_alias'],
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

    public function store_formula_base(Request $request)
    {
             $validated = $request->validate([
           // 'id_informe'=> 'required|integer',
            'formula_sin_variables' => 'required|string',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'formula_con_variables' => 'required|string',
            'campo_destino' => 'required|string',
            'campos_variables' => 'required|json',
            'campo_destino_alias' => 'required|string',
            'parametros' => 'required|json',
            'esPlantilla' => 'nullable|boolean',
        ]);

        // Obtener el id más alto de la tabla (último insertado)
        $ultimoId = DB::table('formulas_biomecanicas_base')->max('id');
        $yaExiste = DB::table('formulas_biomecanicas_base')
            //->where('id_informe', $validated['id_informe'])
            ->where('campo_destino', $validated['campo_destino'])
            ->exists();

        if ($yaExiste) {
            return response()->json(["message" => 'Ya existe una fórmula asignada a '. $validated['campo_destino_alias']],422);
        }
        // Si hay registros, elimina el de id más alto, si no, intenta eliminar el id 1
        // if ($ultimoId) {
        //     DB::table('formulas_biomecanicas')->where('id', $ultimoId)->delete();
        // } else {
        //     DB::table('formulas_biomecanicas')->where('id', 1)->delete();
        // }

        // Insertar el nuevo registro
        $id = DB::table('formulas_biomecanicas_base')->insertGetId([
            //'id' => $ultimoId ? $ultimoId : 1,
            'parametros' => $validated['parametros'],
           // 'id_informe' => $validated['id_informe'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'formula_sin_variables' => $validated['formula_sin_variables'],
            'formula_con_variables' => $validated['formula_con_variables'],
            'campo_destino' => $validated['campo_destino'],
            'campos_variables' => $validated['campos_variables'],
            'campo_destino_alias' => $validated['campo_destino_alias'],
            'esPlantilla' => $validated['esPlantilla'] ?? false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'id_informe'=> 'required|integer',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'campos_sin_variables' => 'required|string',
            'campos_con_variables' => 'required|string',
            'campo_destino' => 'required|string',
            'campo_destino_alias' => 'required|string',
            'campos_variables' => 'required|json',
            'parametros' => 'required|json',
            'esPlantilla' => 'nullable|boolean',
        ]);

    $updated = DB::table('formulas_biomecanicas')
        ->where('id', $id)
        ->update([
            'id_informe' => $validated['id_informe'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'campos_sin_variables' => $validated['campos_sin_variables'],
            'campos_con_variables' => $validated['campos_con_variables'],
            'campo_destino_alias' => $validated['campo_destino_alias'],
            'campo_destino' => $validated['campo_destino'],
            'campos_variables' => $validated['campos_variables'],
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
