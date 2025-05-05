<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = DB::table('clientes')->get();
        return view("clientes.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'nullable|string|max:15|unique:clientes,dni',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'notas' => 'nullable|string',
        ], [
            // Mensajes personalizados
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',
    
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no deben tener más de 100 caracteres.',
    
            'dni.string' => 'El DNI debe ser un texto.',
            'dni.max' => 'El DNI no debe tener más de 15 caracteres.',
            'dni.unique' => 'El DNI ya está registrado.',
    
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',
    
            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',
    
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
        ]);
    
        $id = DB::table('clientes')->insertGetId([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'dni' => $validated['dni'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'email' => $validated['email'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'fecha_nacimiento' => $validated['fecha_nacimiento'] ?? null,
            'notas' => $validated['notas'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Cliente guardado correctamente',
            'cliente_id' => $id,
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
        $cliente = DB::table('clientes')->where('id', $id)->first();
        return view("clientes.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'ID de cliente no proporcionado',
            ], 400);
        }
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => "nullable|string|max:15|unique:clientes,dni,{$id}",
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'notas' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no debe tener más de 100 caracteres.',

            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no deben tener más de 100 caracteres.',

            'dni.string' => 'El DNI debe ser un texto.',
            'dni.max' => 'El DNI no debe tener más de 15 caracteres.',
            'dni.unique' => 'El DNI ya está registrado para otro cliente.',

            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',

            'email.email' => 'El email debe tener un formato válido.',
            'email.max' => 'El email no debe tener más de 100 caracteres.',

            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
        ]);

        $actualizado = DB::table('clientes')
            ->where('id', $id)
            ->update([
                'nombre' => $validated['nombre'],
                'apellidos' => $validated['apellidos'],
                'dni' => $validated['dni'] ?? null,
                'telefono' => $validated['telefono'] ?? null,
                'email' => $validated['email'] ?? null,
                'direccion' => $validated['direccion'] ?? null,
                'fecha_nacimiento' => $validated['fecha_nacimiento'] ?? null,
                'notas' => $validated['notas'] ?? null,
                'updated_at' => now(),
            ]);

        if ($actualizado) {
            return response()->json([
                'success' => true,
                'message' => 'Cliente actualizado correctamente',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el cliente o no hubo cambios',
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

    public function search_autocomplete(Request $request)
    {
        $query = $request->input('query');
        $clientes = DB::table('clientes')
            ->where('nombre', 'LIKE', "%".$query."%")
            ->limit(10)
            ->get();
          // ->orWhere('apellidos', 'LIKE', "%{$query}%")
            // ->orWhere('dni', 'LIKE', "%{$query}%")
        return response()->json($clientes);
    }
}
