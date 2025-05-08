<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recibos = [
            (object)[
                'numero' => 'R-001',
                'fecha' => '2023-03-15',
                'cliente' => 'Juan Pérez',
                'concepto' => 'Pago parcial informe',
                'importe' => '200.00 €',
                'forma_pago' => 'Transferencia',
            ],
            (object)[
                'numero' => 'R-002',
                'fecha' => '2023-03-22',
                'cliente' => 'María Rodríguez',
                'concepto' => 'Pago total',
                'importe' => '600.00 €',
                'forma_pago' => 'Tarjeta',
            ],
            (object)[
                'numero' => 'R-003',
                'fecha' => '2023-04-05',
                'cliente' => 'Carlos López',
                'concepto' => 'Consultoría',
                'importe' => '300.00 €',
                'forma_pago' => 'Efectivo',
            ],
        ];
        
        return view('recibos.index', compact('recibos'));        
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
