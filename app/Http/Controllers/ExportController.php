<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
class ExportController extends Controller
{
    
    public function exportar(Request $request)
    {
        $campos = [
            "cliente_id_2023",
            "despacho",
            "fecha_encargo_firma",
            "fecha_fin_email_despacho",
            "fecha_pago_entrega_factura",
            "comentarios",
            "apellido1",
            "apellido2",
            "nombre",
            "dni",
            "domicilio",
            "poblacion_cp",
            "provincia",
            "telefono",
            "email",
            "clase_vehiculo_2",
            "marca_vehiculo_2",
            "modelo_vehiculo_2",
            "matricula_vehiculo_2",
            "fecha_accidente",
            "hora_accidente",
            "lugar_accidente",
            "poblacion_provincia_accidente",
            "latitud_accidente",
            "longitud_accidente",
            "posicion_vehiculo_2",
            "descripcion_hechos",
            "clase_vehiculo_1",
            "marca_vehiculo_1",
            "modelo_vehiculo_1",
            "matricula_vehiculo_1",
            "conductor1_nombre",
            "conductor1_apellidos",
            "conductor1_dni",
            "num_personas_vehiculo_1",
            "manifestacion_conductor1",
            "tipologia_impacto",
            "danos_vehiculo_1",
            "danos_vehiculo_2",
            "lesiones_cliente",
            "hospital_urgencias",
            "juicio_clinico_urgencias",
            "centro_rehabilitacion",
            "fecha_inicio_rehabilitacion",
            "fecha_fin_rehabilitacion",
            "num_sesiones",
            "fecha_alta",
            "secuelas",
            "reparacion_vehiculo_2",
            "descripcion_danos_reparados",
            "piezas_sustituidas_vehiculo_2",
            "valor_reparacion_vehiculo_2",
            "sexo",
            "edad",
            "actividad_laboral",
            "peso",
            "altura",
            "actividad_deportiva",
            "antecedentes_musculoesqueleticos",
            "accidentes_previos",
            "tratamiento_farmacologico_previo",
            "posicion_cuello",
            "mirada",
            "mano_derecha",
            "mano_izquierda",
            "pie_izquierdo",
            "pie_derecho",
            "pierna_izquierda",
            "pierna_derecha",
            "vio_accidente",
            "desprevenido",
            "musculatura",
            "circunstancias_vehiculo_2",
            "tara_vehiculo_1",
            "momento_vehiculo_1",
            "tara_vehiculo_2",
            "momento_vehiculo_2",
            "descripcion_danos_vehiculo_1",
            "num_personas_vehiculo_2",
            "deltav2_sin_desplazamiento",
            "deltav2_con_desplazamiento",
            "aceleracion_maxima_veh2_m_s2",
            "gs_vehiculo_2",
            "nic_vehiculo_2",
            "fuerza_inercia",
            "aumento_peso_cabeza_total",
            "aumento_peso_cabeza_estimado",
            "gs_total",
            "velocidad_aproximada_veh1",
            "coeficiente_restitucion",
            "deltav_veh1",
            "ocupante1_nombre",
            "ocupante1_apellidos",
            "ocupante1_dni",
            "ocupante1_posicion_vehiculo_2",
            "lesiones_ocupante1",
            "hospital_urgencias_ocupante1",
            "juicio_clinico_ocupante1",
            "centro_rehabilitacion_ocupante1",
            "fecha_inicio_rehabilitacion_ocupante1",
            "fecha_fin_rehabilitacion_ocupante1",
            "sesiones_ocupante1",
            "fecha_alta_ocupante1",
            "secuelas_ocupante1",
            "sexo_ocupante1",
            "edad_ocupante1",
            "actividad_ocupante1",
            "peso_ocupante1",
            "altura_ocupante1",
            "actividad_deportiva_ocupante1",
            "antecedentes_ocupante1",
            "accidentes_previos_ocupante1",
            "tratamiento_previo_ocupante1",
            "posicion_cuello_ocupante1",
            "mirada_ocupante1",
            "mano_derecha_ocupante1",
            "mano_izquierda_ocupante1",
            "pie_izquierdo_ocupante1",
            "pie_derecho_ocupante1",
            "pierna_izquierda_ocupante1",
            "pierna_derecha_ocupante1",
            "vio_accidente_ocupante1",
            "desprevenido_ocupante1",
            "musculatura_ocupante1",
            "ocupante2_nombre",
            "ocupante2_apellidos",
            "ocupante2_dni",
            "ocupante2_posicion_vehiculo_2",
            "lesiones_ocupante2",
            "hospital_urgencias_ocupante2",
            "juicio_clinico_ocupante2",
            "centro_rehabilitacion_ocupante2",
            "fecha_inicio_rehabilitacion_ocupante2",
            "fecha_fin_rehabilitacion_ocupante2",
            "sesiones_ocupante2",
            "fecha_alta_ocupante2",
            "secuelas_ocupante2",
            "sexo_ocupante2",
            "edad_ocupante2",
            "dominancia_ocupante2",
            "peso_ocupante2",
            "altura_ocupante2",
            "actividad_deportiva_ocupante2",
            "antecedentes_ocupante2",
            "accidentes_previos_ocupante2",
            "tratamiento_previo_ocupante2",
            "posicion_cuello_ocupante2",
            "mirada_ocupante2",
            "mano_derecha_ocupante2",
            "mano_izquierda_ocupante2",
            "pie_izquierdo_ocupante2",
            "pie_derecho_ocupante2",
            "pierna_izquierda_ocupante2",
            "pierna_derecha_ocupante2",
            "vio_accidente_ocupante2",
            "desprevenido_ocupante2",
            "musculatura_ocupante2",
            "ocupante3_nombre",
            "ocupante3_apellidos",
            "ocupante3_dni",
            "ocupante3_posicion_vehiculo_2",
            "lesiones_ocupante3",
            "hospital_urgencias_ocupante3",
            "juicio_clinico_ocupante3",
            "centro_rehabilitacion_ocupante3",
            "fecha_inicio_rehabilitacion_ocupante3",
            "fecha_fin_rehabilitacion_ocupante3",
            "sesiones_ocupante3",
            "fecha_alta_ocupante3",
            "secuelas_ocupante3",
            "sexo_ocupante3",
            "edad_ocupante3",
            "dominancia_ocupante3",
            "peso_ocupante3",
            "altura_ocupante3",
            "actividad_deportiva_ocupante3",
            "antecedentes_ocupante3",
            "accidentes_previos_ocupante3",
            "tratamiento_previo_ocupante3",
            "posicion_cuello_ocupante3",
            "mirada_ocupante3",
            "mano_derecha_ocupante3",
            "mano_izquierda_ocupante3",
            "pie_izquierdo_ocupante3",
            "pie_derecho_ocupante3",
            "pierna_izquierda_ocupante3",
            "pierna_derecha_ocupante3",
            "vio_accidente_ocupante3",
            "desprevenido_ocupante3",
            "musculatura_ocupante3",
            "num_personas_veh1_solo_numero",
            "circunstancias_veh2_momento_impacto",
            "anio_matriculacion_veh1",
            "anio_matriculacion_veh2",
            "posicion_conductor",
            "posicion_copiloto",
            "posicion_asiento_trasero_izquierdo",
            "posicion_asiento_trasero_central",
            "posicion_asiento_trasero_derecho",
        ];

        try {
            $numero = mt_rand(2, 53);
            $valores = DB::table('ExcelTrafiges')
                ->where('cliente_id_2023',$numero)
                ->first();

            if (!$valores) {
                return response()->json(['error' => 'No se encontraron datos para el cliente ID: ' . $numero], 404);
            }

            $originalPath = resource_path('plantillas/informe.odt');
            $tempDir = sys_get_temp_dir() . '/odt_' . uniqid();
            $tempOdt = $tempDir . '/modificado.odt';

            mkdir($tempDir);

            // 1. Extraer el ODT
            $zip = new ZipArchive;
            if ($zip->open($originalPath) !== true) {
                throw new \Exception('No se pudo abrir el archivo ODT original.');
            }
            $zip->extractTo($tempDir);
            $zip->close();

            // 2. Leer y modificar content.xml
            $contentPath = $tempDir . '/content.xml';
            $content = file_get_contents($contentPath);
            $reemplazos = [];

            foreach ($campos as $campo) {
                $valor = $valores->$campo ?? '';
                $reemplazos['${' . $campo . '}'] = $valor;
            }

            $content = str_replace(array_keys($reemplazos), array_values($reemplazos), $content);
            file_put_contents($contentPath, $content);

            // 3. Volver a comprimir como ODT
            $zip = new ZipArchive;
            if ($zip->open($tempOdt, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                throw new \Exception('No se pudo crear el archivo ODT modificado.');
            }

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($tempDir),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($tempDir) + 1);

                    if ($relativePath !== 'modificado.odt') {
                        $zip->addFile($filePath, $relativePath);
                    }
                }
            }

            $zip->close();

            // 4. Enviar al navegador como descarga
            return response()->download($tempOdt, 'documento_generado.odt', [
                'Content-Type' => 'application/vnd.oasis.opendocument.text',
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'POST',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
            ])->deleteFileAfterSend(true); // Eliminar el archivo temporal después de la descarga

        } catch (\Exception $e) {
            // Limpieza en caso de error
            if (isset($tempOdt) && file_exists($tempOdt)) {
                unlink($tempOdt);
            }
            if (isset($tempDir) && is_dir($tempDir)) {
                array_map('unlink', glob("$tempDir/*.*"));
                rmdir($tempDir);
            }
            return response()->json(['error' => 'Error al generar el documento: ' . $e->getMessage()], 500);
        }
    }
}
