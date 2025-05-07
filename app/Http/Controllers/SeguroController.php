<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seguros = DB::table('companias_seguros')->get();
        return view("seguros.index", compact('seguros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("seguros.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',
    
            'contacto.string' => 'El contacto debe ser texto.',
            'contacto.max' => 'El contacto no debe tener más de 100 caracteres.',
    
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',
    
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',
        ]);
    
        $id = DB::table('companias_seguros')->insertGetId([
            'nombre' => $validated['nombre'],
            'contacto' => $validated['contacto'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Compañía de seguros registrada correctamente',
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
        $compania = DB::table('companias_seguros')->where('id', $id)->first();
        return view("seguros.edit", compact('compania'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
    
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',
    
            'contacto.string' => 'El contacto debe ser texto.',
            'contacto.max' => 'El contacto no debe tener más de 100 caracteres.',
    
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',
    
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',
        ]);
    
        $updated = DB::table('companias_seguros')->where('id', $id)->update([
            'nombre' => $validated['nombre'],
            'contacto' => $validated['contacto'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'updated_at' => now(),
        ]);
    
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Compañía de seguros actualizada correctamente',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró la compañía o no hubo cambios',
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
