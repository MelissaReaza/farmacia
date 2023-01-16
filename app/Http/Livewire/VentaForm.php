<?php

namespace App\Http\Livewire;

use App\Models\Venta;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\EstadoVenta;
use App\Models\Producto;
use Cart;

class VentaForm extends Component
{
    public $glosa;
    public $id_cliente;
    public $id_estado_venta;
    public $valido = false;

    public $mostrarListaClientes = false;
    public $buscarCliente = "";
    public $clientes;
    public $cliente;

    public $mostrarListaProductos = false;
    public $buscarProducto = "";
    public $productos;

    public function filtroClientes()
    {
        if (!empty($this->buscarCliente)) {
            $this->clientes = Cliente::orderby('nombre', 'asc')->select('*')->whereRaw("upper(nombre) like '%".trim(mb_strtoupper($this->buscarCliente))."%'")->limit(5)->get();
            $this->mostrarListaClientes = true;
        }else{
            $this->mostrarListaClientes = false;
        }
    }

    public function seleccionarCliente($id)
    {
        $this->cliente = Cliente::select('*')->where('id', $id)->first();
        $this->id_cliente = $this->cliente->id;
        $this->mostrarListaClientes = false;
        $this->buscarCliente = "";
        $this->validar();
    }

    public function filtroProductos()
    {
        if (!empty($this->buscarProducto)) {
            $this->productos = Producto::orderby('nombre_comercial', 'asc')->select('*')->where('stock', '>', 0)->whereRaw("upper(nombre_comercial) like '%".trim(mb_strtoupper($this->buscarProducto))."%'")->limit(5)->get();
            $this->mostrarListaProductos = true;
        }else{
            $this->mostrarListaProductos = false;
        }
    }

    public function seleccionarProducto($id)
    {
        if (!Cart::session(auth()->user()->id)->getContent()->contains('id', $id)) {
            $producto = Producto::select('*')->where('id', $id)->first();
            Cart::session(auth()->user()->id)->add(array(
                'id' => $producto->id,
                'name' => $producto->nombre_comercial,
                'price' => $producto->precio,
                'quantity' => 1,
                'attributes' => array(
                    'max_stock' => $producto->stock,
                    'categoria' => $producto->categoria->nombre,
                    'codigo' => $producto->codigo,
                ),
                'associatedModel' => Producto::class
            ));
        }
        $this->mostrarListaProductos = false;
        $this->buscarProducto = "";
    }

    public function quitarProducto($id)
    {
        Cart::session(auth()->user()->id)->remove($id);
        $this->validar();
    }

    public function cantidadProducto($id, $cantidad)
    {
        $cantidad = intval(trim($cantidad));
        $max_stock = Cart::session(auth()->user()->id)->get($id)->attributes['max_stock'];
        if ($cantidad > $max_stock) {
            Cart::session(auth()->user()->id)->update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $max_stock
                ]
            ]);
        } else if ($cantidad <= 0) {
            Cart::session(auth()->user()->id)->update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => 1
                ]
            ]);
        } else {
            Cart::session(auth()->user()->id)->update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $cantidad
                ]
            ]);
        }
        $this->validar();
    }

    public function seleccionarEstado($dato)
    {
        $this->id_estado_venta = intval($dato);
        $this->validar();
    }

    private function validar()
    {
        if ($this->cliente && $this->id_estado_venta && Cart::session(auth()->user()->id)->getTotalQuantity()) {
            $this->valido = true;
        } else {
            $this->valido = false;
        }
    }

    public function render()
    {
        $this->validar();
        $params = [
            'estados' => EstadoVenta::where('nombre', '!=', 'Anulado')->get()->all(),
        ];
        return view('livewire.venta-form', $params);
    }
}
