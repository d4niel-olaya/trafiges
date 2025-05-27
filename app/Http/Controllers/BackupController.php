<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;

class BackupController extends Controller
{
    public function index()
    {
        $backupZipPath = storage_path('app/backups_zip');
        $backupFiles = File::glob($backupZipPath . '/*.zip');

        return view('backup.index', compact('backupFiles'));
    }

    public function generar()
    {
        $fecha = now()->format('Y-m-d_H-i-s');
        $filename = "backup_$fecha.sql";
        $zipFilename = "backup_$fecha.zip";

        $backupDir = storage_path('app/backups_sql');
        $backupZipDir = storage_path('app/backups_zip');

        // Crear carpetas si no existen
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }
        if (!file_exists($backupZipDir)) {
            mkdir($backupZipDir, 0755, true);
        }

        $backupPath = "$backupDir/$filename";
        $zipPath = "$backupZipDir/$zipFilename";

        // Datos de conexión
        $dbHost = env('DB_HOST');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $dbName = env('DB_DATABASE');

        // Ejecutar mysqldump
        $command = "mysqldump --user=$dbUser --password=$dbPass --host=$dbHost $dbName > $backupPath";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode !== 0) {
            return response()->json(['error' => 'Error al crear el respaldo'], 500);
        }

        // Crear archivo zip
        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($backupPath, $filename);
            $zip->close();
        } else {
            return response()->json(['error' => 'No se pudo crear el archivo ZIP'], 500);
        }

        // Opcional: eliminar el archivo .sql original para ahorrar espacio
        unlink($backupPath);

        return response()->json(['success' => 'Respaldo generado y comprimido exitosamente', 'archivo' => $zipFilename]);
    }

    public function descargar($filename)
    {
        $filePath = storage_path("app/backups_zip/$filename");

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }
}
