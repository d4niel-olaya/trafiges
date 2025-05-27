<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class BackupController extends Controller
{
    //


     public function index()
    {
        //
         $backupPath = storage_path('app');
        $backupFiles = File::glob($backupPath . '/*.sql');

        return view('backup.index', compact('backupFiles'));
        //return view("backup.index");
    }


   public function generar()
{
    // Preparar nombre de archivo
    $fecha = now()->format('Y-m-d_H-i-s');
    $filename = "backup_$fecha.sql";

    // Ruta donde se guardará
    $backupDir = storage_path('app');
    $backupPath = $backupDir . "/$filename";

    // Crear carpeta si no existe
    if (!file_exists($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    // Datos de conexión
    $dbHost = env('DB_HOST');
    $dbUser = env('DB_USERNAME');
    $dbPass = env('DB_PASSWORD');
    $dbName = env('DB_DATABASE');

    // Comando mysqldump
    $command = "mysqldump -h$dbHost -u$dbUser -p\"$dbPass\" $dbName 2>&1 > \"$backupPath\"";

    // Ejecutar
    $resultado = null;
    $salida = null;
    exec($command, $salida, $resultado);

    if ($resultado === 0) {
        return back()->with('success', "Backup creado exitosamente: $filename");
    } else {
        return back()->with('error', "Error al generar el backup:<br><pre>" . implode("\n", $salida) . "</pre>");
    }
}


    /**
     * Descarga un backup
     */
    public function descargar($archivo)
    {
        $archivo .= '.sql';
        $filePath = storage_path('app') . "/$archivo";

        if (!file_exists($filePath)) {
            abort(404, "Archivo no encontrado.");
        }

        // Crear nombre del archivo ZIP temporal
        $zipFileName = pathinfo($archivo, PATHINFO_FILENAME) . '.zip';
        $zipFilePath = storage_path('app') . "/$zipFileName";

        // Crear archivo zip
        $zip = new \ZipArchive();
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
            $zip->addFile($filePath, basename($filePath));
            $zip->close();
        } else {
            return response()->json(['error' => 'No se pudo crear el archivo ZIP'], 500);
        }

        // Descargar el archivo zip
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    /**
     * Lista los archivos de backup disponibles
     */
    public function historial()
    {
        $ruta = storage_path('app');
        $archivos = collect(glob("$ruta/*.sql"))->map(function ($archivo) {
            return [
                'nombre' => basename($archivo),
                'tamaño' => round(filesize($archivo) / 1048576, 2), // MB
                'fecha' => date('d/m/Y H:i:s', filemtime($archivo)),
            ];
        });

        return view('backup.historial', compact('archivos'));
    }

}
