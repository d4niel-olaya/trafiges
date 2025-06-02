<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //}
        $path = storage_path('app/public/plantillas');
        $archivos = File::glob($path . '/*.docx');
         // Actualizar la fecha de actualización de todas las plantillas

        return view("plantillas_documentos.index", compact('archivos'));
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
        //
         $request->validate([
             'titulo' => 'required|string|max:100',
             'descripcion' => 'nullable|string|max:255',
            'plantilla' => 'required|file|mimes:docx|max:10240'// 10 240 KB = 10 MB
        ]);


        $archivo = $request->file('plantilla');
        $titulo = $request->input('titulo');
        $extension = $archivo->getClientOriginalExtension(); // .docx
        $nombreArchivo = Str::slug($titulo) . '_' . time() . '.' . $extension;
        $ruta = $archivo->storeAs('plantillas',$nombreArchivo, 'public');
        DB::table('plantillas')->insert([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'ruta' => $ruta,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return response()->json(['mensaje' => 'Archivo subido correctamente']);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
