<?php

namespace App\Http\Livewire;

use App\Models\Laboratorio;
use Livewire\WithPagination;
use Livewire\Component;

class LaboratorioIndex extends Component
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
        $laboratorios = $this->consulta();
        $laboratorios =$laboratorios->paginate( $this->paginacion );
        if( $laboratorios->currentPage() > $laboratorios->lastPage() ){
            $this->resetPage();
            $laboratorios = $this->consulta();
            $laboratorios =$laboratorios->paginate( $this->paginacion );
        }
        $params = [
            'laboratorios' => $laboratorios,
        ];
        return view('livewire.laboratorio-index', $params);

    }

    private function consulta()
    {
        $query = Laboratorio::orderBy('id');
        if( $this->busqueda != '' )
        {
            $query->where('razon', 'LIKE', '%'.$this->busqueda.'%');
        }
        return $query;
    }
}
