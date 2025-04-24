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
        $informe= DB::table("informes")->orderBy("fechaAccidente","desc")->where("id","=", $id)->get();    
        return view("informes.show", ["informes" => $informe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view("informes.edit");
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
