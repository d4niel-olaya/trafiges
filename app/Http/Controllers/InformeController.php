<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $informes = DB::table("informes")->select("id","matricula","fechaAccidente","nombreCliente","abogadoAsociado","peritoAsignado", "tipoInforme", "companiaSeguros")->orderBy("fechaAccidente","desc")->get();    
        return view("informes.index", ["informes" => $informes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("informes.create");
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
            'abogadoAsociado' => 'required|string',
            'peritoAsignado' => 'required|string',
            'tipoInforme' => 'required|string',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|string',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
        ]);

        $datosCompletos = json_encode([
            'id' => $nuevoId,
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

        DB::table('informes')->insert([
            'id' => $nuevoId,
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
            'datos' => $datosCompletos,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
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
        
        //return $informe;
        return view("informes.edit",["informe" => $informe]);
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
            'fechaAccidente' => 'required|date',
            'nombreCliente' => 'required|string',
            'abogadoAsociado' => 'required|string',
            'peritoAsignado' => 'required|string',
            'tipoInforme' => 'required|string',
            'coordenadasGeograficas' => 'nullable|string',
            'fechaEntregaAbogado' => 'nullable|date',
            'fechaEntregaCliente' => 'nullable|date',
            'companiaSeguros' => 'nullable|string',
            'tipoColision' => 'nullable|string',
            'vehiculo1' => 'required|array',
            'vehiculo2' => 'required|array',
            'resultadosBiomecanicos' => 'required|array',
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
                'abogadoAsociado' => $validatedData['abogadoAsociado'],
                'peritoAsignado' => $validatedData['peritoAsignado'],
                'tipoInforme' => $validatedData['tipoInforme'],
                'coordenadasGeograficas' => $validatedData['coordenadasGeograficas'],
                'fechaEntregaAbogado' => $validatedData['fechaEntregaAbogado'],
                'fechaEntregaCliente' => $validatedData['fechaEntregaCliente'],
                'companiaSeguros' => $validatedData['companiaSeguros'],
                'tipoColision' => $validatedData['tipoColision'],
                'datos' => $datosCompletos,
                'updated_at' => now(),
            ]);
    
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
