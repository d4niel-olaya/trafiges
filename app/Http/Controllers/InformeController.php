<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelWriter;
class InformeController extends Controller
{
    private function stringIsNullOrEmpty($str) {
        return is_null($str) || $str === '';
    }
    public function search(Request $request)
    {
   
        $estado = $request->input("estado");
        $abogadoAsociado = $request->input("abogadoAsociado");
        $numeroInforme = $request->input("numeroInforme");
        $fechaAccidente = $request->input("fechaAccidente");
        $matricula = $request->input("matricula");
        if($this->stringIsNullOrEmpty($estado) == true)
        {
            $estado = '%';
        }
        if($this->stringIsNullOrEmpty($abogadoAsociado) == true)
        {
            $abogadoAsociado = '%';
        }
        if($this->stringIsNullOrEmpty($fechaAccidente) == true)
        {
            $fechaAccidente = '%';
        }
        
        if($this->stringIsNullOrEmpty($numeroInforme) == true)
        {
            $numeroInforme = '%';
        }
        if($this->stringIsNullOrEmpty($matricula) == true)
        {
            $matricula = '%';
        }
         $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $informes = DB::table("informes")
              ->select(
            "informes.id",
            "informes.numero_informe",
            "informes.matricula",
            "informes.fechaAccidente",
            "informes.estado",
            "clientes.nombre as nombreCliente",
            "abogados.nombre as abogadoAsociado",
            "peritos.nombre as peritoAsignado",
            "informes.tipoInforme",
            "informes.companiaSeguros"
         )   
        ->leftJoin("abogados", "informes.idAbogado", "=", "abogados.id")
        ->leftJoin("peritos", "informes.idPerito", "=", "peritos.id")
        ->leftJoin("clientes", "informes.idCliente", "=", "clientes.id")
        ->orderBy("informes.fechaAccidente","desc")
        ->where("informes.estado","like", $estado)
        ->where("informes.idAbogado","like", $abogadoAsociado)
        ->where("informes.id","like", $numeroInforme)
        ->whereDate("fechaAccidente","like", $fechaAccidente)
        ->where("informes.matricula","like", $matricula)
        ->get();   
        return view("informes.index", ["informes" => $informes,"abogados" => $abogados]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $informes = DB::table("informes")
              ->select(
            "informes.id",
            "informes.numero_informe",
            "informes.matricula",
            "informes.fechaAccidente",
            "informes.estado",
            "clientes.nombre as nombreCliente",
            "abogados.nombre as abogadoAsociado",
            "peritos.nombre as peritoAsignado",
            "informes.tipoInforme",
            "informes.companiaSeguros"
         )   
        ->leftJoin("abogados", "informes.idAbogado", "=", "abogados.id")
        ->leftJoin("peritos", "informes.idPerito", "=", "peritos.id")
        ->leftJoin("clientes", "informes.idCliente", "=", "clientes.id")
        ->orderBy("informes.created_at","desc")->get();   

        $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        return view("informes.index", ["informes" => $informes, "abogados" => $abogados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $peritos = DB::table("peritos")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $companias = DB::table("companias_seguros")->select("id","nombre")->orderBy("nombre","asc")->get();
        $tipos_informe = DB::table("tipos_informe")->select("id","nombre","precio")->orderBy("nombre","asc")->get();
       
        return view("informes.create", ["peritos" => $peritos, "abogados" => $abogados, "companias" => $companias, "tipos_informe" => $tipos_informe]);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ultimoInforme = DB::table('informes')->orderBy('created_at', 'desc')->first();

    // Generar un nuevo ID basado en el último ID
        if ($ultimoInforme) {
            $ultimoId = $ultimoInforme->numero_informe; // Obtener el último ID
            $numero = (int) str_replace('INF-', '', $ultimoId); // Extraer el número del ID
            $nuevoId = 'INF-' . str_pad($numero + 1, 4, '0', STR_PAD_LEFT); // Incrementar y formatear
        } else {
            $nuevoId = 'INF-0001'; // Si no hay registros, iniciar con INF-0001
        }
        $validatedData = $request->validate([
            'matricula' => 'required|string',
            'fechaAccidente' => 'required|date',
            'nombreCliente' => 'required|string',
            'estado' => 'required|string',
            'abogadoAsociado' => 'nullable|integer',
            'peritoAsignado' => 'nullable|integer',
            //'tipoInforme' => 'required|string',
            'tipoInforme' => 'nullable|integer',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|integer',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
            'ocupantes' => 'required|array',

             'meteorologia' => 'nullable|string',
            'estado_via' => 'nullable|string',
            'estado_via_otros' => 'nullable|string|max:100',
            'inclinacion_via' => 'nullable|string',
            'nombre_testigo' => 'nullable|string|max:100',
            'apellido_testigo' => 'nullable|string|max:100',
        ]);

        $datosCompletos = json_encode([
            'id' => $nuevoId,
            'matricula' => $validatedData['matricula'],
            'fechaAccidente' => $validatedData['fechaAccidente'],
            'nombreCliente' => $validatedData['nombreCliente'],
            'estado' => $validatedData['estado'],
            'abogadoAsociado' => $validatedData['abogadoAsociado'],
            'peritoAsignado' => $validatedData['peritoAsignado'],
            'tipoInforme' => $validatedData['tipoInforme'] ?? null,
            'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
            'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
            'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
            'companiaSeguros' => $validatedData['companiaSeguros'],
            'tipoColision' => $validatedData['tipoColision'],

            'meteorologia' => $validatedData['meteorologia'] ?? null,
            'estado_via' => $validatedData['estado_via'] ?? null,
            'estado_via_otros' => $validatedData['estado_via_otros'] ?? null,
            'inclinacion_via' => $validatedData['inclinacion_via'] ?? null,
            'nombre_testigo' => $validatedData['nombre_testigo'] ?? null,
            'apellido_testigo' => $validatedData['apellido_testigo'] ?? null,
            
            'vehiculo1' => $validatedData['vehiculo1'],
            'vehiculo2' => $validatedData['vehiculo2'],
            'resultadosBiomecanicos' => $validatedData['resultadosBiomecanicos'],
            
           
        ]);

        $id_informe = DB::table('informes')->insertGetId([
            'numero_informe' => $nuevoId,
            'matricula' => $validatedData['matricula'],
            'fechaAccidente' => $validatedData['fechaAccidente'],
            'estado' => $validatedData['estado'],
            'nombreCliente' => $validatedData['nombreCliente'],
            'idCliente' => $request->input('idCliente'),
            //'abogadoAsociado' => $validatedData['abogadoAsociado'],
            'idAbogado' => $validatedData['abogadoAsociado'],
           // 'peritoAsignado' => $validatedData['peritoAsignado'],
            'idPerito' => $validatedData['peritoAsignado'],
            //'tipoInforme' => $validatedData['tipoInforme'],
            'idTipoInforme' => $validatedData['tipoInforme'] ?? null,
            'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
            'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
            'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
            'companiaSeguros' => null,
            'idCompaniaSeguros' => $validatedData['companiaSeguros'],
            'tipoColision' => $validatedData['tipoColision'],
            'meteorologia' => $validatedData['meteorologia'] ?? null,
            'estado_via' => $validatedData['estado_via'] ?? null,
            'estado_via_otros' => $validatedData['estado_via_otros'] ?? null,
            'inclinacion_via' => $validatedData['inclinacion_via'] ?? null,
            'nombre_testigo' => $validatedData['nombre_testigo'] ?? null,
            'apellido_testigo' => $validatedData['apellido_testigo'] ?? null,
            'datos' => $datosCompletos,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        foreach ($validatedData['ocupantes'] as $ocupante) {
            DB::table('informes_ocupantes')->insert([
                'idInforme' => $id_informe,
                'tipo_ocupante' => $ocupante['tipo_ocupante'] ?? 'conductor',
                'nombre' => $ocupante['nombre'] ?? null,
                'apellidos' => $ocupante['apellidos'] ?? null,
                'dni' => $ocupante['dni'] ?? null,
                'posicion' => $ocupante['posicion'] ?? null,
                'sexo' => $ocupante['sexo'] ?? null,
                'edad' => $ocupante['edad'] ?? null,
                'peso' => $ocupante['peso'] ?? null,
                'altura' => $ocupante['altura'] ?? null,
                'dominancia' => $ocupante['dominancia'] ?? null,
                'actividad_laboral' => $ocupante['actividad_laboral'] ?? null,
                'actividad_deportiva' => $ocupante['actividad_deportiva'] ?? null,
                'accidentes_previos' => $ocupante['accidentes_previos'] ?? null,
                'tratamiento_farmacologico' => $ocupante['tratamiento_farmacologico'] ?? null,
                'posicion_general' => $ocupante['posicion_general'] ?? null,
                'posicion_cuello' => $ocupante['posicion_cuello'] ?? null,
                'mirada' => $ocupante['mirada'] ?? null,
                'mano_derecha' => $ocupante['mano_derecha'] ?? null,
                'mano_izquierda' => $ocupante['mano_izquierda'] ?? null,
                'pie_derecho' => $ocupante['pie_derecho'] ?? null,
                'pie_izquierdo' => $ocupante['pie_izquierdo'] ?? null,
                'pierna_derecha' => $ocupante['pierna_derecha'] ?? null,
                'pierna_izquierda' => $ocupante['pierna_izquierda'] ?? null,
                'descripcion_circunstancias' => $ocupante['descripcion_circunstancias'] ?? null,
                'vio_impacto' => $ocupante['vio_impacto'] ?? 0,
                'desprevenido' => $ocupante['desprevenido'] ?? 0,
                'musculatura' => $ocupante['musculatura'] ?? null,
                'circunstancias_vehiculo' => $ocupante['circunstancias_vehiculo'] ?? null,
                'lesiones' => $ocupante['lesiones'] ?? null,
                'zonas_afectadas' => $ocupante['zonas_afectadas'] ?? null,
                'hospital_urgencias' => $ocupante['hospital_urgencias'] ?? null,
                'juicio_urgencias' => $ocupante['juicio_urgencias'] ?? null,
                'centro_rhb' => $ocupante['centro_rhb'] ?? null,
                'juicio_rhb' => $ocupante['juicio_rhb'] ?? null,
                'fecha_inicio_rhb' => $ocupante['fecha_inicio_rhb'] ?? null,
                'fecha_fin_rhb' => $ocupante['fecha_fin_rhb'] ?? null,
                'numero_sesiones' => $ocupante['numero_sesiones'] ?? null,
                'fecha_alta' => $ocupante['fecha_alta'] ?? null,
                'secuelas' => $ocupante['secuelas'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        // Retornar una respuesta JSON
        return response()->json(['message' => 'Informe creado correctamente', 'id' => $nuevoId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $informe= DB::table("informes")->orderBy("fechaAccidente","desc")->where("id","=", $id)->get();    
        
        return view("informes.show", ["informe" => $informe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $informe= DB::table("informes")->orderBy("fechaAccidente","desc")->where("id","=", $id)->get();    
        $ocupantes_conductor = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","conductor")->get();
        $ocupantes_copiloto = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","copiloto")->get();
        $ocupantes_detras_conductor = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","detras conductor")->get();
        $ocupantes_detras_copiloto = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","detras copiloto")->get();
        $ocupantes_detras_centro = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","detras centro")->get();
        $ocupantes_detras_3 = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","detras 3")->get();
        $ocupantes_detras_4 = DB::table("informes_ocupantes")->where("idInforme","=", $id)->where("tipo_ocupante","=","detras 4")->get();
        $abogados = DB::table("abogados")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $peritos = DB::table("peritos")->select("id","nombre","apellidos")->orderBy("nombre","asc")->get();
        $companias = DB::table("companias_seguros")->select("id","nombre")->orderBy("nombre","asc")->get();
        $tipos_informe = DB::table("tipos_informe")->select("id","nombre","precio")->orderBy("nombre","asc")->get();
        $tipos_informes_asociados = DB::table("informes_tiposInformes")
                                    ->join("tipos_informe","tipos_informe.id","=","informes_tiposInformes.id_tipo_informe")
                                    ->select('informes_tiposInformes.id',"tipos_informe.nombre","informes_tiposInformes.precio")
                                    ->orderBy("tipos_informe.nombre","asc")
                                    ->where("informes_tiposInformes.id_informe","=",$id)
                                    ->get();
                        
         $pagos = DB::table("pagos")->select("pagos.id","concepto","beneficiario","importe","metodo_pago","estado","informe_id", "fecha")
         ->where("pagos.informe_id","=", $id)->get();
        $totalPagos = DB::table("informes_tiposInformes")->where("id_informe","=", $id)->sum("precio");
        //return $informe;
        return view("informes.edit",["informe" => $informe, "ocupantes_conductor" => $ocupantes_conductor
                , "ocupantes_copiloto" => $ocupantes_copiloto,
                "ocupantes_detras_conductor" => $ocupantes_detras_conductor,
                "ocupantes_detras_copiloto" => $ocupantes_detras_copiloto,
                "ocupantes_detras_centro" => $ocupantes_detras_centro,
                "ocupantes_detras_3" => $ocupantes_detras_3,
                "ocupantes_detras_4" => $ocupantes_detras_4,
                "peritos" => $peritos,
                "abogados" => $abogados,
                "companias" => $companias,
                "tipos_informe" => $tipos_informe,
                "pagos" => $pagos,
                "tipos_informes_asociados" => $tipos_informes_asociados,
                "totalPagos" => $totalPagos,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $request->merge([
        //     'vehiculo1' => (array) $request->vehiculo1,
        //     'vehiculo2' => (array) $request->vehiculo2,
        //     'resultadosBiomecanicos' => (array) $request->resultadosBiomecanicos,
        // ]);
        $validatedData = $request->validate([
            'id' => 'required|string',
            'matricula' => 'required|string',
            'estado' => 'required|string',
            'fechaAccidente' => 'required|date',
            'nombreCliente' => 'required|string',
           // 'abogadoAsociado' => 'required|string',
            'abogadoAsociado' => 'nullable|integer',
            'peritoAsignado' => 'nullable|integer',
            //'tipoInforme' => 'required|string',
            'tipoInforme' => 'nullable|integer',
            //'coordenadasGeograficas' => 'required|string',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|integer',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
            'ocupantes' => 'required|array', 

            'meteorologia' => 'nullable|string',
            'estado_via' => 'nullable|string',
            'estado_via_otros' => 'nullable|string|max:100',
            'inclinacion_via' => 'nullable|string',
            'nombre_testigo' => 'nullable|string|max:100',
            'apellido_testigo' => 'nullable|string|max:100',
        ]);
    
        // Convertir los datos de vehículos y resultados biomecánicos a JSON
        $datosCompletos = json_encode([
            'id' => $validatedData['id'],
            'matricula' => $validatedData['matricula'],
            'fechaAccidente' => $validatedData['fechaAccidente'],
            'nombreCliente' => $validatedData['nombreCliente'],
            'abogadoAsociado' => $validatedData['abogadoAsociado'],
            'peritoAsignado' => $validatedData['peritoAsignado'],
            'tipoInforme' => $validatedData['tipoInforme'],
            'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
            'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
            'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
            'companiaSeguros' => $validatedData['companiaSeguros'],
            'tipoColision' => $validatedData['tipoColision'],
            'meteorologia' => $validatedData['meteorologia'] ?? null,
            'estado_via' => $validatedData['estado_via'] ?? null,
            'estado_via_otros' => $validatedData['estado_via_otros'] ?? null,
            'inclinacion_via' => $validatedData['inclinacion_via'] ?? null,
            'nombre_testigo' => $validatedData['nombre_testigo'] ?? null,
            'apellido_testigo' => $validatedData['apellido_testigo'] ?? null,
            'vehiculo1' => $validatedData['vehiculo1'],
            'vehiculo2' => $validatedData['vehiculo2'],
            'resultadosBiomecanicos' => $validatedData['resultadosBiomecanicos'],
        ]);
    
        // Actualizar el informe en la base de datos
        DB::table('informes')
            ->where('id', $validatedData['id'])
            ->update([
                'matricula' => $validatedData['matricula'],
                'fechaAccidente' => $validatedData['fechaAccidente'],
                'nombreCliente' => $validatedData['nombreCliente'],
                'idCliente' => $request->input('idCliente'),
                'estado' => $validatedData['estado'],
               // 'abogadoAsociado' => $validatedData['abogadoAsociado'],
                'idAbogado' => $validatedData['abogadoAsociado'],
                //'peritoAsignado' => $validatedData['peritoAsignado'],
                'idPerito' => $validatedData['peritoAsignado'],
                //'tipoInforme' => $validatedData['tipoInforme'],
                'idTipoInforme' => $validatedData['tipoInforme'],
                'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
                'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
                'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
                'companiaSeguros' => null,
                'idCompaniaSeguros' => $validatedData['companiaSeguros'],
                'tipoColision' => $validatedData['tipoColision'],
                'meteorologia' => $validatedData['meteorologia'] ?? null,
                'estado_via' => $validatedData['estado_via'] ?? null,
                'estado_via_otros' => $validatedData['estado_via_otros'] ?? null,
                'inclinacion_via' => $validatedData['inclinacion_via'] ?? null,
                'nombre_testigo' => $validatedData['nombre_testigo'] ?? null,
                'apellido_testigo' => $validatedData['apellido_testigo'] ?? null,
                'datos' => $datosCompletos,
                'updated_at' => now(),
            ]);

            DB::table('informes_ocupantes')->where('idInforme', $validatedData['id'])->delete();

            foreach ($validatedData['ocupantes'] as $ocupante) {
                DB::table('informes_ocupantes')->insert([
                    'idInforme' => $validatedData['id'],
                    'tipo_ocupante' => $ocupante['tipo_ocupante'] ?? 'conductor',
                    'nombre' => $ocupante['nombre'] ?? null,
                    'apellidos' => $ocupante['apellidos'] ?? null,
                    'dni' => $ocupante['dni'] ?? null,
                    'posicion' => $ocupante['posicion'] ?? 'conductor',
                    'sexo' => $ocupante['sexo'] ?? null,
                    'edad' => $ocupante['edad'] ?? null,
                    'peso' => $ocupante['peso'] ?? null,
                    'altura' => $ocupante['altura'] ?? null,
                    'dominancia' => $ocupante['dominancia'] ?? null,
                    'actividad_laboral' => $ocupante['actividad_laboral'] ?? null,
                    'actividad_deportiva' => $ocupante['actividad_deportiva'] ?? null,
                    'accidentes_previos' => $ocupante['accidentes_previos'] ?? null,
                    'tratamiento_farmacologico' => $ocupante['tratamiento_farmacologico'] ?? null,
                    'posicion_general' => $ocupante['posicion_general'] ?? null,
                    'posicion_cuello' => $ocupante['posicion_cuello'] ?? null,
                    'mirada' => $ocupante['mirada'] ?? null,
                    'mano_derecha' => $ocupante['mano_derecha'] ?? null,
                    'mano_izquierda' => $ocupante['mano_izquierda'] ?? null,
                    'pie_derecho' => $ocupante['pie_derecho'] ?? null,
                    'pie_izquierdo' => $ocupante['pie_izquierdo'] ?? null,
                    'pierna_derecha' => $ocupante['pierna_derecha'] ?? null,
                    'pierna_izquierda' => $ocupante['pierna_izquierda'] ?? null,
                    'descripcion_circunstancias' => $ocupante['descripcion_circunstancias'] ?? null,
                    'vio_impacto' => $ocupante['vio_impacto'] ?? 0,
                    'desprevenido' => $ocupante['desprevenido'] ?? 0,
                    'musculatura' => $ocupante['musculatura'] ?? null,
                    'circunstancias_vehiculo' => $ocupante['circunstancias_vehiculo'] ?? null,
                    'lesiones' => $ocupante['lesiones'] ?? null,
                    'zonas_afectadas' => $ocupante['zonas_afectadas'] ?? null,
                    'hospital_urgencias' => $ocupante['hospital_urgencias'] ?? null,
                    'juicio_urgencias' => $ocupante['juicio_urgencias'] ?? null,
                    'centro_rhb' => $ocupante['centro_rhb'] ?? null,
                    'juicio_rhb' => $ocupante['juicio_rhb'] ?? null,
                    'fecha_inicio_rhb' => $ocupante['fecha_inicio_rhb'] ?? null,
                    'fecha_fin_rhb' => $ocupante['fecha_fin_rhb'] ?? null,
                    'numero_sesiones' => $ocupante['numero_sesiones'] ?? null,
                    'fecha_alta' => $ocupante['fecha_alta'] ?? null,
                    'secuelas' => $ocupante['secuelas'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            //return response()->json(['message' => 'Informe actualizado correctamente', 'id' => $input['id']]);
           return response()->json(['message' => 'Informe actualizado correctamente', 'id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportarExcel()
    {
         $fileName = 'informes.xlsx';

        return response()->streamDownload(function () {
            $rows = DB::table("informes")
              ->select(
            "informes.id",
            "informes.matricula",
            "informes.fechaAccidente",
            DB::raw("
            CASE informes.estado
                WHEN 'en_proceso' THEN 'En proceso'
                WHEN 'urgente' THEN 'Urgente'
                WHEN 'pendiente' THEN 'Pendiente'
                WHEN 'finalizado' THEN 'Finalizado'
                ELSE '⚪ Desconocido'
            END AS estado"),
            "clientes.nombre as nombreCliente",
            "abogados.nombre as abogadoAsociado",
            "peritos.nombre as peritoAsignado",
            "informes.tipoInforme",
            "informes.companiaSeguros"
         )   
            ->leftJoin("abogados", "informes.idAbogado", "=", "abogados.id")
            ->leftJoin("peritos", "informes.idPerito", "=", "peritos.id")
            ->leftJoin("clientes", "informes.idCliente", "=", "clientes.id")
            ->orderBy("informes.created_at","desc")->get();   

            SimpleExcelWriter::streamDownload('informes.xlsx', 'xlsx')
                ->addHeader(['ID', 'Matricula', 'Fecha Accidente', 'Estado', 'Nombre Cliente', 'Abogado Asociado', 'Perito Asignado', 'Tipo Informe', 'Compañía Seguros'])
                ->addRows($rows->map(function ($informe) {
                    return [
                        'ID'     => $informe->id,
                        'Matricula' => $informe->matricula,
                        'Fecha Accidente' => $informe->fechaAccidente,
                        'Estado'  => $informe->estado,
                        'Nombre Cliente' => $informe->nombreCliente,
                        'Abogado Asociado' => $informe->abogadoAsociado,
                        'Perito Asignado' => $informe->peritoAsignado,
                        'Tipo Informe' => $informe->tipoInforme,
                        'Compañía Seguros' => $informe->companiaSeguros,
                    ];
                })->toArray());
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }


    public function exportarCSV()
{
    $informes =  DB::table("informes")
              ->select(
            "informes.id",
            "informes.matricula",
            "informes.fechaAccidente",
            "informes.estado",
            "clientes.nombre as nombreCliente",
            "abogados.nombre as abogadoAsociado",
            "peritos.nombre as peritoAsignado",
            "informes.tipoInforme",
            "informes.companiaSeguros"
         )   
        ->leftJoin("abogados", "informes.idAbogado", "=", "abogados.id")
        ->leftJoin("peritos", "informes.idPerito", "=", "peritos.id")
        ->leftJoin("clientes", "informes.idCliente", "=", "clientes.id")
        ->orderBy("informes.created_at","desc")->get();   

    // Encabezados del archivo
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="informes.csv"',
    ];

    // Callback que construye el CSV
    $callback = function () use ($informes) {
        $handle = fopen('php://output', 'w');
        
        // Escribe la fila de encabezados
        fputcsv($handle, ['Id', 'Matricula', 'Fecha Accidente', 'Estado', 'Nombre Cliente', 'Abogado Asociado', 'Perito Asignado', 'Tipo Informe', 'Compañía Seguros']);

        // Escribe los datos
        foreach ($informes as $informe) {
            fputcsv($handle, [
                $informe->id,
                $informe->matricula,
                $informe->fechaAccidente,
                $informe->estado,
                $informe->nombreCliente,
                $informe->abogadoAsociado,
                $informe->peritoAsignado,
                $informe->tipoInforme,
                $informe->companiaSeguros,

            ]);
        }

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}


    public function asociarTipoInforme(Request $request)
    {
        $idInforme = $request->input('idInforme');
        $idTipoInforme = $request->input('idTipoInforme');
        $validarTipoInforme = DB::table('informes_tiposInformes')
            ->where('id_informe', $idInforme)
            ->where('id_tipo_informe', $idTipoInforme)
            ->exists();
        if ($validarTipoInforme) {
            return response()->json(['message' => 'El tipo de informe ya está asociado'], 400);
        }
    //     $precio = DB::table('tipos_informe')
    // ->where('idTipoInforme', $idTipoInforme)
    // ->value('precio');

    // DB::table('informes_tiposInformes')
    //     ->insert([
    //         'idInforme' => $idInforme,
    //         'idTipoInforme' => $idTipoInforme,
    //         'precio' => $precio,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);
        DB::insert('
        INSERT INTO informes_tiposInformes (id_informe, id_tipo_informe, precio, created_at, updated_at)
        SELECT ?, ?, precio, NOW(), NOW()
        FROM tipos_informe
        WHERE id = ?
    ', [$idInforme, $idTipoInforme, $idTipoInforme]);


        return response()->json(['message' => 'Tipo de informe asociado correctamente']);
    }

}
