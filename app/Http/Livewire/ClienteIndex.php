<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
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
        $clientes = $this->consulta();
        $clientes = $clientes->paginate($this->paginacion);
        if( $clientes->currentPage() > $clientes->lastPage() ){
            $this->resetPage();
            $clientes = $this->consulta();
            $clientes = $clientes->paginate( $this->paginacion );
        }
        $params = [
            'clientes' => $clientes,
        ];
        return view('livewire.cliente-index', $params);

    }

    private function consulta()
    {
        $query = Cliente::orderBy('nombre');
        if($this->busqueda != '')
        {
            $query->orWhereRaw("upper(nombre) like '%".trim(mb_strtoupper($this->busqueda))."%'")->orWhereRaw("cast(ci as char) like '".trim(mb_strtoupper($this->busqueda))."%'");
        }
        return $query;
    }
}
