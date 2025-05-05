<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\HttpFoundation\StreamedResponse;
class WordExportController extends Controller
{
    public function exportWordDocument(string $id_informe)
    {
        // Ruta de la plantilla
        $templatePath = resource_path('plantillas/VALORACIÓN BIOMECÁNICA CLÍNIC1.docx');
 
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Plantilla no encontrada.'], 404);
        }

        // Consulta de los datos
        $datos = DB::select('CALL obtener_informe_con_ocupantes(?)', [$id_informe]);
        $datos = $datos[0] ?? null;
        if (!$datos) {
            return response()->json(['error' => 'Informe no encontrado.'], 404);
        }

        // Inicializar TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);

        // Reemplazar las variables en la plantilla
        foreach ((array)$datos as $key => $value) {
            $templateProcessor->setValue($key, $value ?? '');
        }

       // Crear carpeta si no existe
        $folderPath = storage_path('app/generated');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        // Guardar archivo Word
        $outputPath = $folderPath . "/word_export_{$id_informe}.docx";
        $templateProcessor->saveAs($outputPath);
        // Devolver archivo como descarga
        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
