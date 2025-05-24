<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagos = DB::table('pagos')
            ->join('informes', 'pagos.informe_id', '=', 'informes.id')
            ->select('informes.numero_informe as id', 'pagos.fecha', 'pagos.concepto', 'pagos.beneficiario', 'pagos.importe', 'pagos.estado')
            ->orderBy('pagos.fecha', 'desc')
            ->get();
        return view('pagos.index', compact('pagos'));        
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
        
        $validatedData = $request->validate([
            'concepto'     => 'nullable|string|max:100',
            'beneficiario' => 'nullable|string|max:100',
            'importe'      => 'nullable|numeric',
            'metodo_pago'  => 'required|string|max:30',
            'estado'       => 'in:Pendiente,Realizado,Cancelado',
            'informe_id'   => 'required|exists:informes,id',
        ]);

        $precioTotal = DB::table('informes_tiposInformes')
            ->leftJoin('tipos_informe', 'informes_tiposInformes.id_informe', '=', 'tipos_informe.id')
            ->where('informes_tiposInformes.id_informe',"=", $validatedData['informe_id'])
            ->sum('informes_tiposInformes.precio');

        $sumaPagos = DB::table('pagos')
            ->where('informe_id', $validatedData['informe_id'])
            ->sum('importe');
        
        
        if ($sumaPagos + $validatedData['importe'] > $precioTotal) {
            return response()->json(['success' => false, 'message' => 'El importe total de los pagos no puede superar el precio del informe.'],422);
        }
            
        $id = DB::table('pagos')->insertGetId([
            'fecha'        => now(),
            'concepto'     => $validatedData['concepto'] ?? null,
            'beneficiario' => $validatedData['beneficiario'] ?? null,
            'importe'      => $validatedData['importe'] ?? null,
            'metodo_pago'  => $validatedData['metodo_pago'],
            'estado'       => $validatedData['estado'] ?? 'Pendiente',
            'informe_id'   => $validatedData['informe_id'],
        ]);

        return response()->json(['success' => true, 'id' => $id, 'fecha'=> now()->format('d/m/Y'),201]);
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
         $validatedData = $request->validate([
        'id'           => 'required|exists:pagos,id',
        'concepto'     => 'nullable|string|max:100',
        'beneficiario' => 'nullable|string|max:100',
        'importe'      => 'nullable|numeric',
        'metodo_pago'  => 'required|string|max:30',
        'estado'       => 'in:Pendiente,Realizado,Cancelado',
        'informe_id'   => 'required|exists:informes,id',
        ]);

        $affected = DB::table('pagos')
            ->where('id', $validatedData['id'])
            ->update([
                'concepto'     => $validatedData['concepto'] ?? null,
                'beneficiario' => $validatedData['beneficiario'] ?? null,
                'importe'      => $validatedData['importe'] ?? null,
                'metodo_pago'  => $validatedData['metodo_pago'],
                'estado'       => $validatedData['estado'] ?? 'Pendiente',
                'informe_id'   => $validatedData['informe_id'],
            ]);

    return response()->json(['success' => $affected > 0]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
