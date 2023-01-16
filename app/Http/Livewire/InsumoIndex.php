<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\Component;

class InsumoIndex extends Component
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
        $insumos = $this->consulta();
        $insumos = $insumos->paginate($this->paginacion);
        if ($insumos->currentPage() > $insumos->lastPage()) {
            $this->resetPage();
            $insumos = $this->consulta();
            $insumos =$insumos->paginate($this->paginacion);
        }
        $params = [
            'insumos' => $insumos,
        ];
        return view('livewire.insumo-index', $params);
    }

    private function consulta()
    {
        $query = Producto::whereRelation('categoria', 'nombre', 'Insumo')->orderBy('id');
        if( $this->busqueda != '' )
        {
            $query->where('nombre_comercial', 'LIKE', '%'.$this->busqueda.'%');
        }
        return $query;
    }
}
