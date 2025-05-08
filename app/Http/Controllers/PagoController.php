<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagos = [
            (object)[
                'id' => 'P-001',
                'fecha' => '2023-03-15',
                'concepto' => 'Pago a perito',
                'beneficiario' => 'Carlos Martínez',
                'importe' => '300.00 €',
                'estado' => 'Realizado',
            ],
            (object)[
                'id' => 'P-002',
                'fecha' => '2023-03-25',
                'concepto' => 'Material oficina',
                'beneficiario' => 'Papelería Central',
                'importe' => '120.00 €',
                'estado' => 'Realizado',
            ],
            (object)[
                'id' => 'P-003',
                'fecha' => '2023-04-10',
                'concepto' => 'Alquiler oficina',
                'beneficiario' => 'Inmobiliaria Sol',
                'importe' => '800.00 €',
                'estado' => 'Pendiente',
            ],
        ];
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
