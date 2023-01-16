<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\Component;

class MedicamentoIndex extends Component
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
        $medicamentos = $this->consulta();
        $medicamentos =$medicamentos->paginate( $this->paginacion );
        if( $medicamentos->currentPage() > $medicamentos->lastPage() ){
            $this->resetPage();
            $medicamentos = $this->consulta();
            $medicamentos =$medicamentos->paginate( $this->paginacion );
        }
        $params = [
            'medicamentos' => $medicamentos,
        ];
        return view('livewire.medicamento-index', $params);

    }

    private function consulta()
    {
        $query = Producto::whereRelation('categoria', 'nombre', 'Medicamento')->orderBy('id');
        if( $this->busqueda != '' )
        {
            $query->where('nombre_comercial', 'LIKE', '%'.$this->busqueda.'%');
        }
        return $query;
    }
}
