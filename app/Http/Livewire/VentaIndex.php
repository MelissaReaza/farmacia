<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class VentaIndex extends Component
{
    use WithPagination;
    public $busqueda = '';
    public $paginacion = 5;
    protected $paginationTheme = 'bootstrap';
    protected $queryString =
    [
        'busqueda' => ['except' => ''],
        'paginacion' => ['except' => 5],
    ];

    public function render()
    {
        $ventas = $this->consulta();
        $ventas = $ventas->paginate($this->paginacion);
        if( $ventas->currentPage() > $ventas->lastPage() ){
            $this->resetPage();
            $ventas = $this->consulta();
            $ventas = $ventas->paginate( $this->paginacion );
        }
        $params = [
            'ventas' => $ventas,
        ];
        return view('livewire.venta-index', $params);

    }

    private function consulta()
    {
        $query = Venta::select('ventas.id', 'ventas.created_at', 'ventas.id_estado_venta', 'ventas.id_cliente', 'ventas.id_usuario', 'ventas.glosa', 'ventas.total', 'usuarios.nombre as nombre_usuario', 'usuarios.apellido_p as apellido_usuario', 'clientes.nombre as nombre_cliente', 'estado_ventas.nombre as nombre_estado')->leftJoin('usuarios', 'usuarios.id', '=', 'ventas.id_usuario')->leftJoin('clientes', 'clientes.id', '=', 'ventas.id_cliente')->leftJoin('estado_ventas', 'estado_ventas.id', '=', 'ventas.id_estado_venta');
        if (auth()->user()->rol != 'Administrador') {
            $query->where('ventas.id_usuario', auth()->user()->id);
        }
        if ($this->busqueda != '')
        {
            if (auth()->user()->rol == 'Administrador') {
                $query->orWhereRaw("upper(usuarios.nombre) like '%".trim(mb_strtoupper($this->busqueda))."%'")->orWhereRaw("upper(usuarios.apellido_p) like '%".trim(mb_strtoupper($this->busqueda))."%'");
            }
            $self = $this;
            $query->where(function($q) use ($self) {
                $date = null;
                try {
                    $date = Carbon::createFromFormat('d/m/Y', $this->busqueda);
                    if ($date != null) {
                        $q->orWhereDate('ventas.created_at', '=', $date);
                    }
                } catch(\Exception $e) {}
                $q->orWhereRaw("upper(clientes.nombre) like '%".trim(mb_strtoupper($this->busqueda))."%'");
            });
        }
        $query->orderBy('ventas.created_at', 'desc');

        return $query;
    }
}
