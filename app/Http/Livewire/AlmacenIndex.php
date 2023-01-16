<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use Livewire\WithPagination;
use Livewire\Component;

class AlmacenIndex extends Component
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
        $almacenes = $this->consulta();
        $almacenes =$almacenes->paginate( $this->paginacion );
        if( $almacenes->currentPage() > $almacenes->lastPage() ){
            $this->resetPage();
            $almacenes = $this->consulta();
            $almacenes =$almacenes->paginate( $this->paginacion );
        }
        $params = [
            'almacenes' => $almacenes,
        ];
        return view('livewire.almacen-index', $params);

    }

    private function consulta()
    {
        $query = Almacen::orderBy('id');
        if( $this->busqueda != '' )
        {
            $query->where('rac', 'LIKE', '%'.$this->busqueda.'%');
        }
        return $query;
    }
}
