<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abogados = DB::table('abogados')->get();
        return view("abogados.index", compact('abogados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("abogados.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'despacho' => 'nullable|string|max:150',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ], [
            // Mensajes personalizados
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',
    
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no deben tener más de 100 caracteres.',
    
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',
    
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',
    
            'despacho.string' => 'El despacho debe ser texto.',
            'despacho.max' => 'El despacho no debe tener más de 150 caracteres.',
        ]);
    
        $id = DB::table('abogados')->insertGetId([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'despacho' => $validated['despacho'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Abogado guardado correctamente',
            'abogado_id' => $id,
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
        $abogado = DB::table('abogados')->where('id', $id)->first();
        return view("abogados.edit", compact('abogado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $id = $request->input('id');
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'despacho' => 'nullable|string|max:150',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',
    
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no deben tener más de 100 caracteres.',
    
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',
    
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',
    
            'despacho.string' => 'El despacho debe ser texto.',
            'despacho.max' => 'El despacho no debe tener más de 150 caracteres.',
        ]);
    
        $updated = DB::table('abogados')->where('id', $id)->update([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'despacho' => $validated['despacho'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'updated_at' => now(),
        ]);
    
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Abogado actualizado correctamente',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el abogado o no hubo cambios',
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
