<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioIndex extends Component
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
        $usuarios = $this->consulta();
        $usuarios = $usuarios->paginate($this->paginacion);
        if( $usuarios->currentPage() > $usuarios->lastPage() ){
            $this->resetPage();
            $usuarios = $this->consulta();
            $usuarios = $usuarios->paginate( $this->paginacion );
        }
        $params = [
            'usuarios' => $usuarios,
        ];
        return view('livewire.usuario-index', $params);

    }

    private function consulta()
    {
        $query = Usuario::orderBy('nombre');
        if($this->busqueda != '')
        {
            $query->orWhereRaw("upper(nombre) like '%".trim(mb_strtoupper($this->busqueda))."%'")->orWhereRaw("upper(apellido_p) like '%".trim(mb_strtoupper($this->busqueda))."%'")->orWhereRaw("upper(apellido_m) like '%".trim(mb_strtoupper($this->busqueda))."%'");
        }
        return $query;
    }
}
