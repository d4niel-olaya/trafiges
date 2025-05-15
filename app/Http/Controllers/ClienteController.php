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
        $clientes =  DB::table('clientes')
        ->select('clientes.*', 'abogados.nombre as abogadoAsociado')  
        ->leftJoin('abogados', 'clientes.idAbogado', '=', 'abogados.id')
        ->get();
        return view("clientes.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        return view("clientes.create", compact('abogados'));
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
             'idAbogado' => 'nullable|integer|exists:abogados,id',
            'notas' => 'nullable|string',
             // Nuevos campos
            'poblacion' => 'nullable|string|max:200',
            'provincia' => 'nullable|string|max:100',
            'estatura' => 'nullable|integer|min:0|max:255',
            'peso' => 'nullable|integer|min:0|max:255',
            'antecedentesClinicos' => 'nullable|string',
            'antecedentesMedicos' => 'nullable|string',
            'antecedentesAccidentes' => 'nullable|string',
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

            'poblacion.string' => 'La población debe ser texto.',
            'poblacion.max' => 'La población no debe tener más de 200 caracteres.',

            'provincia.string' => 'La provincia debe ser texto.',
            'provincia.max' => 'La provincia no debe tener más de 100 caracteres.',

            'estatura.integer' => 'La estatura debe ser un número entero.',
            'estatura.min' => 'La estatura no puede ser negativa.',
            'estatura.max' => 'La estatura no debe ser mayor a 255 cm.',

            'peso.integer' => 'El peso debe ser un número entero.',
            'peso.min' => 'El peso no puede ser negativo.',
            'peso.max' => 'El peso no debe ser mayor a 255 kg.',

            'antecedentesClinicos.string' => 'Los antecedentes clínicos deben ser texto.',
            'antecedentesMedicos.string' => 'Los antecedentes médicos deben ser texto.',
            'antecedentesAccidentes.string' => 'Los antecedentes de accidentes deben ser texto.',
            'idAbogado' => 'nullable|integer|exists:abogados,id'
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
            'idAbogado' => $validated['idAbogado'] ?? null,
                     // Nuevos campos
            'poblacion' => $validated['poblacion'] ?? null,
            'provincia' => $validated['provincia'] ?? null,
            'estatura' => $validated['estatura'] ?? null,
            'peso' => $validated['peso'] ?? null,
            'antecedentesClinicos' => $validated['antecedentesClinicos'] ?? null,
            'antecedentesMedicos' => $validated['antecedentesMedicos'] ?? null,
            'antecedentesAccidentes' => $validated['antecedentesAccidentes'] ?? null,
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
        $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $cliente = DB::table('clientes')
        ->select('clientes.*')  
        ->leftJoin('abogados', 'clientes.idAbogado', '=', 'abogados.id')
        ->where('clientes.id', $id)->first();
        return view("clientes.edit", compact('cliente','abogados'));
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
            'poblacion' => 'nullable|string|max:200',
            'provincia' => 'nullable|string|max:100',
            'estatura' => 'nullable|integer|min:0|max:255',
            'peso' => 'nullable|integer|min:0|max:255',
            'antecedentesClinicos' => 'nullable|string',
            'antecedentesMedicos' => 'nullable|string',
            'antecedentesAccidentes' => 'nullable|string',
            'idAbogado' => 'nullable|integer|exists:abogados,id',
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

            
            'poblacion.string' => 'La población debe ser texto.',
            'poblacion.max' => 'La población no debe tener más de 200 caracteres.',

            'provincia.string' => 'La provincia debe ser texto.',
            'provincia.max' => 'La provincia no debe tener más de 100 caracteres.',

            'estatura.integer' => 'La estatura debe ser un número entero.',
            'estatura.min' => 'La estatura no puede ser negativa.',
            'estatura.max' => 'La estatura no debe ser mayor a 255 cm.',

            'peso.integer' => 'El peso debe ser un número entero.',
            'peso.min' => 'El peso no puede ser negativo.',
            'peso.max' => 'El peso no debe ser mayor a 255 kg.',

            'antecedentesClinicos.string' => 'Los antecedentes clínicos deben ser texto.',
            'antecedentesMedicos.string' => 'Los antecedentes médicos deben ser texto.',
            'antecedentesAccidentes.string' => 'Los antecedentes de accidentes deben ser texto.',
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
                'idAbogado' => $validated['idAbogado'] ?? null,
                    // Nuevos campos
                'poblacion' => $validated['poblacion'] ?? null,
                'provincia' => $validated['provincia'] ?? null,
                'estatura' => $validated['estatura'] ?? null,
                'peso' => $validated['peso'] ?? null,
                'antecedentesClinicos' => $validated['antecedentesClinicos'] ?? null,
                'antecedentesMedicos' => $validated['antecedentesMedicos'] ?? null,
                'antecedentesAccidentes' => $validated['antecedentesAccidentes'] ?? null,
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
