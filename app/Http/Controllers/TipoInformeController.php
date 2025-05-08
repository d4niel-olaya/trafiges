<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TipoInformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiposinformes = DB::table('tipos_informe')->get();
        return view('tiposinformes.index', compact('tiposinformes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tiposinformes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no debe superar los 100 caracteres.',

            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        $id = DB::table('tipos_informe')->insertGetId([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'precio' => $validated['precio'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tipo de informe creado correctamente.',
            'id' => $id,
        ]);
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
        $tipoInforme = DB::table('tipos_informe')->where('id', $id)->first();
        return view('tiposinformes.edit', compact('tipoInforme'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no debe superar los 100 caracteres.',

            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        $updated = DB::table('tipos_informe')->where('id', $id)->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'precio' => $validated['precio'] ?? null,
            'updated_at' => now(),
        ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Tipo de informe actualizado correctamente.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el tipo de informe o no hubo cambios.',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
