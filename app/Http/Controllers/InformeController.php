<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
       
        $informes = DB::table("informes")->select("id","matricula","fechaAccidente","estado","nombreCliente","abogadoAsociado","peritoAsignado", "tipoInforme", "companiaSeguros")->
        orderBy("fechaAccidente","desc")
        ->where("estado","like", $estado)
        ->where("abogadoAsociado","like", $abogadoAsociado)
        ->where("id","like", $numeroInforme)
        ->whereDate("fechaAccidente","like", $fechaAccidente)
        ->where("matricula","like", $matricula)
        ->get();   
        return view("informes.index", ["informes" => $informes]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $informes = DB::table("informes")->select("id","matricula","fechaAccidente","estado","nombreCliente","abogadoAsociado","peritoAsignado", "tipoInforme", "companiaSeguros")->orderBy("fechaAccidente","desc")->get();   
        return view("informes.index", ["informes" => $informes]);
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
        return view("informes.create", ["peritos" => $peritos, "abogados" => $abogados, "companias" => $companias]);
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
            $ultimoId = $ultimoInforme->id;
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
            'tipoInforme' => 'required|string',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|integer',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
            'ocupantes' => 'required|array',
        ]);

        $datosCompletos = json_encode([
            'id' => $nuevoId,
            'matricula' => $validatedData['matricula'],
            'fechaAccidente' => $validatedData['fechaAccidente'],
            'nombreCliente' => $validatedData['nombreCliente'],
            'estado' => $validatedData['estado'],
            'abogadoAsociado' => $validatedData['abogadoAsociado'],
            'peritoAsignado' => $validatedData['peritoAsignado'],
            'tipoInforme' => $validatedData['tipoInforme'],
            'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
            'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
            'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
            'companiaSeguros' => $validatedData['companiaSeguros'],
            'tipoColision' => $validatedData['tipoColision'],
            'vehiculo1' => $validatedData['vehiculo1'],
            'vehiculo2' => $validatedData['vehiculo2'],
            'resultadosBiomecanicos' => $validatedData['resultadosBiomecanicos'],
        ]);

        DB::table('informes')->insert([
            'id' => $nuevoId,
            'matricula' => $validatedData['matricula'],
            'fechaAccidente' => $validatedData['fechaAccidente'],
            'estado' => $validatedData['estado'],
            'nombreCliente' => $validatedData['nombreCliente'],
            'idCliente' => $request->input('idCliente'),
            //'abogadoAsociado' => $validatedData['abogadoAsociado'],
            'idAbogado' => $validatedData['abogadoAsociado'],
           // 'peritoAsignado' => $validatedData['peritoAsignado'],
            'idPerito' => $validatedData['peritoAsignado'],
            'tipoInforme' => $validatedData['tipoInforme'],
            'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
            'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
            'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
            'companiaSeguros' => null,
            'idCompaniaSeguros' => $validatedData['companiaSeguros'],
            'tipoColision' => $validatedData['tipoColision'],
            'datos' => $datosCompletos,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        foreach ($validatedData['ocupantes'] as $ocupante) {
            DB::table('informes_ocupantes')->insert([
                'idInforme' => $nuevoId,
                'tipo_ocupante' => $ocupante['tipo_ocupante'] ?? 'conductor',
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
            'tipoInforme' => 'required|string',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|integer',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
            'ocupantes' => 'required|array', 
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
                'tipoInforme' => $validatedData['tipoInforme'],
                'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
                'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
                'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
                'companiaSeguros' => null,
                'idCompaniaSeguros' => $validatedData['companiaSeguros'],
                'tipoColision' => $validatedData['tipoColision'],
                'datos' => $datosCompletos,
                'updated_at' => now(),
            ]);

            DB::table('informes_ocupantes')->where('idInforme', $validatedData['id'])->delete();

            foreach ($validatedData['ocupantes'] as $ocupante) {
                DB::table('informes_ocupantes')->insert([
                    'idInforme' => $validatedData['id'],
                    'tipo_ocupante' => $ocupante['tipo_ocupante'] ?? 'conductor',
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

    
}
