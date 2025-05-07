<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peritos = DB::table('peritos')->get();
        return view("peritos.index", compact('peritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("peritos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'especialidad' => 'nullable|string|max:100',
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
    
            'especialidad.string' => 'La especialidad debe ser texto.',
            'especialidad.max' => 'La especialidad no debe tener más de 100 caracteres.',
        ]);
    
        $id = DB::table('peritos')->insertGetId([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'especialidad' => $validated['especialidad'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Perito guardado correctamente',
            'perito_id' => $id,
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
        $perito = DB::table('peritos')->where('id', $id)->first();
        return view("peritos.edit", compact('perito'));
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
            'especialidad' => 'nullable|string|max:100',
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
    
            'especialidad.string' => 'La especialidad debe ser texto.',
            'especialidad.max' => 'La especialidad no debe tener más de 100 caracteres.',
        ]);
    
        $updated = DB::table('peritos')->where('id', $id)->update([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'especialidad' => $validated['especialidad'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'updated_at' => now(),
        ]);
    
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Perito actualizado correctamente',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el perito o no hubo cambios',
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
