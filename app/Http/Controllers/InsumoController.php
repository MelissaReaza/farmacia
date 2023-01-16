<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsumoRequest;
use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Producto;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insumo.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $laboratorios = Laboratorio::all();
        return view('insumo.create', [
            // 'laboratorios' => $laboratorios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\MedicamentoRequest
     * @return \Illuminate\Http\Response
     */
    public function store(InsumoRequest $request)
    {
        $datos = $request->validated();
        $datos['categoria_id'] = Categoria::whereNombre('Insumo')->first()->id;
        $insumo = Producto::create( $datos );
        return redirect()->route('insumo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $insumo)
    {
        return view('insumo.show', ['insumo' => $insumo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $insumo)
    {
        return view('insumo.edit',compact('insumo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(InsumoRequest $request, Producto $insumo)
    {
        $datos = $request->validated();
        $datos['categoria_id'] = Categoria::whereNombre('insumo')->first()->id;
        $insumo->update( $datos );
        return redirect()->route('insumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $insumo)
    {
        $insumo->delete();
        return redirect()->route('insumo.index');
    }
}
