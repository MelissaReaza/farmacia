<?php

namespace App\Http\Controllers;

use App\Models\EstadoVenta;
use App\Http\Requests\StoreEstadoVentaRequest;
use App\Http\Requests\UpdateEstadoVentaRequest;

class EstadoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstadoVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadoVentaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoVenta  $estadoVenta
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoVenta $estadoVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstadoVenta  $estadoVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoVenta $estadoVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadoVentaRequest  $request
     * @param  \App\Models\EstadoVenta  $estadoVenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadoVentaRequest $request, EstadoVenta $estadoVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadoVenta  $estadoVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoVenta $estadoVenta)
    {
        //
    }
}
