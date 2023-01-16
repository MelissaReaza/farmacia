<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store']);

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::post('logout', [AuthController::class, 'destroy']);

    Route::get('dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::resource('laboratorio', LaboratorioController::class);
    Route::resource('almacen', AlmacenController::class);
    Route::resource('medicamento', MedicamentoController::class);
    Route::resource('insumo', InsumoController::class);
    Route::resource('lote', LoteController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('venta', VentaController::class);

    Route::get('reporte', [ReporteController::class, 'index'])->name('reporte.index');
    Route::get('reporte/vencidos', [ReporteController::class, 'vencidos'])->name('reporte.vencidos');
    Route::get('reporte/vencidos/pdf', [ReporteController::class, 'pdf_vencidos'])->name('reporte.pdf_vencidos');
    Route::get('reporte/existencias_insumos', [ReporteController::class, 'existencias_insumos'])->name('reporte.existencias_insumos');
    Route::get('reporte/existencias_insumos/pdf', [ReporteController::class, 'pdf_existencias_insumos'])->name('reporte.pdf_existencias_insumos');
    Route::get('reporte/bajo_stock', [ReporteController::class, 'bajo_stock'])->name('reporte.bajo_stock');
    Route::get('reporte/bajo_stock/pdf', [ReporteController::class, 'pdf_bajo_stock'])->name('reporte.pdf_bajo_stock');
    Route::get('venta/{venta}/pdf', [VentaController::class, 'pdf_factura'])->name('venta.pdf_factura');
});
