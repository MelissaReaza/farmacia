<?php

namespace App\Http\Livewire;

use App\Models\Lote;
use Livewire\WithPagination;
use Livewire\Component;

class LoteIndex extends Component
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
        $lotes = $this->consulta();
        $lotes =$lotes->paginate( $this->paginacion );
        if( $lotes->currentPage() > $lotes->lastPage() ){
            $this->resetPage();
            $lotes = $this->consulta();
            $lotes =$lotes->paginate( $this->paginacion );
        }
        $params = [
            'lotes' => $lotes,
        ];
        return view('livewire.lote-index', $params);

    }

    private function consulta()
    {
        $query = Lote::orderBy('id');
        if( $this->busqueda != '' )
        {
            $query->where('laboratorios_id', 'LIKE', '%'.$this->busqueda.'%');
        }
        return $query;
    }
}
