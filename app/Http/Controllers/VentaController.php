<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Venta;
use App\Models\EstadoVenta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\VentaRequest;
use App\Models\Producto;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Cart::session(auth()->user()->id)->clear();
        return view('venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
        $datos = $request->validated();
        $venta = Venta::create([
            'id_estado_venta' => intval($datos['id_estado_venta']),
            'id_cliente' => intval($datos['id_cliente']),
            'id_usuario' => auth()->user()->id,
            'glosa' => $datos['glosa'],
            'total' => Cart::session(auth()->user()->id)->getTotal(),
        ]);
        foreach (Cart::session(auth()->user()->id)->getContent() as $producto) {
            DetalleVenta::create([
                'id_venta' => $venta->id,
                'nombre_comercial' => $producto->name,
                'id_producto' => $producto->id,
                'cantidad' => $producto->quantity,
                'precio' => $producto->price,
                'subtotal' => $producto->getPriceSum(),
            ]);
            Producto::where('id', $producto->id)->decrement('stock', $producto->quantity);
        }
        Cart::session(auth()->user()->id)->clear();
        return redirect()->to('/venta/'.$venta->id.'?pdf=1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $venta)
    {
        $venta = Venta::find($venta);
        return view('venta.show', [
            'venta' => $venta,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($venta)
    {
        $venta = Venta::find($venta);
        foreach ($venta->detalle as $detalle) {
            Producto::where('id', $detalle->id_producto)->increment('stock', $detalle->cantidad);
        }
        $venta->update([
            'id_estado_venta' => EstadoVenta::where('nombre', 'Anulado')->first()->id,
        ]);
        return redirect()->route('venta.index');
    }

    public function pdf_factura(Venta $venta)
    {
        $papel = array(0,0,164.6,929.73);
        $params = [
            'venta' => $venta,
        ];
        $pdf = Pdf::loadView('pdf.ventas.factura', $params)->setPaper($papel, 'portrait');;
        return $pdf->download('factura_'.strval($venta->id).'.pdf');
    }
}
