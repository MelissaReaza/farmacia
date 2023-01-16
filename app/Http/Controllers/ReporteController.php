<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    private function consulta_medicamentos_vencidos()
    {
        $por_vencer = Producto::select('productos.id', 'productos.nombre_comercial', 'lotes.fecha_ingreso', 'lotes.fecha_vencimiento', 'laboratorios.razon', 'laboratorios.telefono')->selectRaw('"Por Vencer" as estado')->whereRelation('categoria', 'nombre', 'Medicamento')->leftJoin('lotes', 'productos.lote_id', '=', 'lotes.id')->leftJoin('laboratorios', 'lotes.laboratorios_id', '=', 'laboratorios.id')->whereDate('lotes.fecha_vencimiento', '<=', Carbon::now()->addMonths(3)->endOfDay())->whereDate('lotes.fecha_vencimiento', '>', Carbon::now())->orderBy('lotes.fecha_vencimiento');
        $vencidos = Producto::select('productos.id', 'productos.nombre_comercial', 'lotes.fecha_ingreso', 'lotes.fecha_vencimiento', 'laboratorios.razon', 'laboratorios.telefono')->selectRaw('"Vencido" as estado')->whereRelation('categoria', 'nombre', 'Medicamento')->leftJoin('lotes', 'productos.lote_id', '=', 'lotes.id')->leftJoin('laboratorios', 'lotes.laboratorios_id', '=', 'laboratorios.id')->whereDate('lotes.fecha_vencimiento', '<=', Carbon::now()->endOfDay())->orderBy('lotes.fecha_vencimiento')->unionAll($por_vencer);
        $params = [
            'medicamentos' => $vencidos->get(),
        ];
        return $params;
    }

    public function vencidos()
    {
        return view('reportes.vencidos', $this->consulta_medicamentos_vencidos());
    }

    public function pdf_vencidos()
    {
        $pdf = Pdf::loadView('pdf.reportes.vencidos', $this->consulta_medicamentos_vencidos());
        return $pdf->download('vencidos.pdf');
    }

    private function consulta_existencias_insumos()
    {
        $insumos = Producto::select('*')->whereRelation('categoria', 'nombre', 'Insumo')->orderBy('nombre_comercial');
        $params = [
            'insumos' => $insumos->get(),
        ];
        return $params;
    }

    public function existencias_insumos()
    {
        return view('reportes.existencias_insumos', $this->consulta_existencias_insumos());
    }

    public function pdf_existencias_insumos()
    {
        $pdf = Pdf::loadView('pdf.reportes.existencias_insumos', $this->consulta_existencias_insumos());
        return $pdf->download('existencias_insumos.pdf');
    }

    private function consulta_bajo_stock()
    {
        $productos = Producto::select('productos.id', 'categorias.nombre as nombre_categoria', 'productos.nombre_comercial', 'productos.nombre_generico', 'productos.detalle', 'laboratorios.razon as proveedor', 'lotes.fecha_ingreso', 'productos.stock')->selectRaw("case when productos.stock = 0 then 'Agotado' when productos.stock < 30 then 'Muy bajo' end as estado")->leftJoin('lotes', 'lotes.id', '=', 'productos.lote_id')->leftJoin('laboratorios', 'laboratorios.id', '=', 'lotes.laboratorios_id')->leftJoin('categorias', 'categorias.id', '=', 'productos.categoria_id')->where('productos.stock', '<', 30);
        $params = [
            'productos' => $productos->get(),
        ];
        return $params;
    }

    public function bajo_stock()
    {
        return view('reportes.bajo_stock', $this->consulta_bajo_stock());
    }

    public function pdf_bajo_stock()
    {
        $pdf = Pdf::loadView('pdf.reportes.bajo_stock', $this->consulta_bajo_stock());
        return $pdf->download('bajo_stock.pdf');
    }
}
