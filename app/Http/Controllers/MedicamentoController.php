<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentoRequest;
use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Producto;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicamento.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $laboratorios = Laboratorio::all();
        return view('medicamento.create', [
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
    public function store(MedicamentoRequest $request)

    {

        $datos = $request->validated();
        $datos['categoria_id'] = Categoria::whereNombre('Medicamento')->first()->id;
        $medicamento = Producto::create( $datos );
        return redirect()->route('medicamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $medicamento)
    {
        return view('medicamento.show', ['medicamento' => $medicamento]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $medicamento)
    {
        return view('medicamento.edit',compact('medicamento'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(MedicamentoRequest $request, Producto $medicamento)
    {
        $datos = $request->validated();
        $datos['categoria_id'] = Categoria::whereNombre('Medicamento')->first()->id;
        $medicamento->update( $datos );
        return redirect()->route('medicamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamento.index');
    }
}
