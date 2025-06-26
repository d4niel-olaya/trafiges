<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //}
        // $path = storage_path('app/private/plantillas');
        // $archivos = File::glob($path . '/*.docx');
        //  // Actualizar la fecha de actualización de todas las plantillas

        // return view("plantillas_documentos.index", compact('archivos'));
        $archivos = DB::table('plantillas')
        ->where('activo', 1)
        ->get();

        // 2️⃣ (Opcional) Verifica que el archivo exista en el storage
        // $archivos = $archivos->map(function ($plantilla) {
        //     $existe = Storage::disk('local')->exists($plantilla->ruta);
        //     $plantilla->existe_archivo = $existe;
        //     return $plantilla;
        // });

        // 3️⃣ Envía a la vista
        return view('plantillas_documentos.index', compact('archivos'));
    }

     public function descargar(string $archivo)
    {
        //$archivo .= '.docx';
        $filePath = storage_path('app/public/plantillas') . "/$archivo";

        if (!file_exists($filePath)) {
            abort(404, "Archivo no encontrado.". "" . $filePath);
        }

        // // Crear nombre del archivo ZIP temporal
        // $zipFileName = pathinfo($archivo, PATHINFO_FILENAME) . '.zip';
        // $zipFilePath = storage_path('app/public/plantillas') . "/$zipFileName";

        // // Crear archivo zip
        // $zip = new \ZipArchive();
        // if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
        //     $zip->addFile($filePath, basename($filePath));
        //     $zip->close();
        // } else {
        //     return response()->json(['error' => 'No se pudo crear el archivo ZIP'], 500);
        // }

        // Descargar el archivo zip
        return response()->download($filePath)->deleteFileAfterSend(false);
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
             'titulo' => 'required|string|max:100|unique:plantillas,titulo',
             'descripcion' => 'nullable|string|max:255',
            'plantilla' => 'required|file|mimes:docx|max:10240'// 10 240 KB = 10 MB
        ] ,[
            'titulo.required' => 'El título es obligatorio.',
            'titulo.unique' => 'Ese título ya existe.',
            'plantilla.required' => 'Debes subir un archivo.',
            'plantilla.mimes' => 'El archivo debe ser un .docx.',
            'plantilla.max' => 'El archivo no puede superar los 10 MB.'
        ]);


        if (!$request->hasFile('plantilla')) {
            return response()->json(['message' => 'No se encontró ningún archivo.'], 422);
        }

        

        $archivo = $request->file('plantilla');
        $titulo = $request->input('titulo');
        $extension = $archivo->getClientOriginalExtension();
        $nombreArchivo = Str::slug($titulo) . '_' . time() . '.' . $extension;

        try {
            //$ruta = $archivo->storeAs('plantillas', $nombreArchivo);
               $ruta = $archivo->storeAs('plantillas', $nombreArchivo, 'public');
            //Storage::disk('local')->put('plantillas/' . $nombreArchivo, $archivo->getContent());
           
            DB::table('plantillas')->insert([
                'titulo' => $titulo,
                'descripcion' => $request->input('descripcion'),
                'ruta' => $ruta,
                "nombre_archivo" => $nombreArchivo,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', "Plantilla '$titulo' subida correctamente.");
        } catch (\Exception $e) {
            Log::error('Error al subir el archivo: ' . $e->getMessage());
            return back()->with('error', "Error al subir la plantilla:<br><pre>" .  $e->getMessage() . "</pre>");
        }
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
    public function update(Request $request)
    {
        //
         $validated = $request->validate([
            'id' => 'required|integer|exists:plantillas,id',
         ]);

         DB::table('plantillas')
            ->where('id', $validated['id'])
            ->update([
                'activo' => 0,
                'updated_at' => now(),
            ]);

        return response()->json(['success' => true, 'message' => 'Plantilla Eliminada correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
