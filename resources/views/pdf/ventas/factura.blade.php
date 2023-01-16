<!DOCTYPE html>
<html>
<head>
    <title>Factura {{ $venta->id }}</title>
</head>
<body>
    <div class="center" style="width: 60px; margin: 0 auto;">
        <div style="height: 20px; width: 60px; margin-top: 3px; margin-bottom: 1px;">
            <img src="{{ asset('img/logCerefe.jpg') }}" id="logo" alt="Logo" style="width: 100%; object-fit: cover;"/>
        </div>
    </div>
    <div class="center fuente8" style="margin-top: 5px; margin-bottom: 5px;">
        Fundacion Cerefe
    </div>
    <div class="fuente8">
        <strong>Fecha: </strong>{{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y H:i') }}
    </div>
    <div class="fuente8">
        <strong>Estado: </strong>{{ $venta->estado_venta->nombre }}
    </div>
    <div class="fuente8">
        <strong>Recibo N°: </strong>0000{{$venta->id}}
    </div>
    <table style="margin: 5px auto;">
        <thead>
            <tr>
                <th class="fuente8 left" width="40%">Descripción</th>
                <th class="fuente8 right" width="10%">C.</th>
                <th class="fuente8 right" width="25%">Precio</th>
                <th class="fuente8 right" width="25%">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->detalle as $producto)
            <tr>
                <td class="fuente8 left">{{ $producto->nombre_comercial }}</td>
                <td class="fuente8 right">{{ $producto->cantidad }}</td>
                <td class="fuente8 right">Bs. {{ number_format($producto->precio, 2, ',', '.') }}</td>
                <td class="fuente8 right">Bs. {{ number_format($producto->subtotal, 2, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="fuente8 right">
                    <strong>
                        Total
                    </strong>
                </td>
                <td class="fuente8 right">
                    Bs. <strong>{{ number_format($venta->total, 2, ',', '.') }}</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="fuente8">
        <strong>Vendedor:</strong> {{ $venta->usuario['nombre'] }} {{ $venta->usuario['apellido_p'] }}
    </div>
    <div class="fuente8 center">
        Muchas gracias por su preferencia
    </div>
</body>
<style>
	@page {
		margin: 0.1cm !important;
        padding: 0px 0px 0px 0px !important;
	}
	body {
		font-family: Arial, sans-serif;
	}
	.center {
		text-align: center;
	}
	.right {
		text-align: right;
		padding-right: 3px;
	}
	.left {
		text-align: left;
		padding-left: 3px;
	}
	.bold {
		font-weight: bold;
	}
	table {
		width: 100%;
		table-layout: fixed;
		margin: 0px;
	}
	table, td {
		border-collapse: collapse;
	}
	.fuente8 {
		font-size: 8px !important;
	}
	.fuente12 {
		font-size: 12px !important;
	}
	.fuente16 {
		font-size: 16px !important;
		text-decoration: underline;
	}
	.borde {
		border: 1px solid black;
	}
</style>
</html>
