<!DOCTYPE html>
<html>
<head>
    <title>REPORTE DE STOCKS REDUCIDOS</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td width="20%">
                    <div style="height: 30px; width: 100%; margin-top: 3px; margin-bottom: 1px;">
						<img src="{{ asset('img/logCerefe.jpg') }}" id="logo" alt="Logo" style="height: 100%; width: 60%; object-fit: cover;"/>
					</div>
                </td>
                <td width="60%">
                    <div class="center bold fuente16">
                        REPORTE DE STOCKS REDUCIDOS
                    </div>
                    <div class="center fuente10" style="padding-top: 3px; padding-bottom: 10px;">
                        Impreso el: {{ \Carbon\Carbon::now()->format('d/m/Y \a \l\a\s H:i') }}
                    </div>
                </td>
                <td width="20%"></td>
            </tr>
        </tbody>
    </table>

    <table class="table" style="padding-top: 20px;">
        <tbody>
            <tr class="bold fuente12">
                <td width="5%" class="borde center">#</td>
                <td width="10%" class="borde center">Tipo</td>
                <td width="15%" class="borde center">Nombre Comercial</td>
                <td width="15%" class="borde center">Nombre Genérico</td>
                <td width="15%" class="borde center">Detalle</td>
                <td width="15%" class="borde center">Proveedor</td>
                <td width="10%" class="borde center">Fecha de Ingreso</td>
                <td width="7%" class="borde center">Stock</td>
                <td width="8%" class="borde center">Estado</td>
            </tr>
            @foreach ($productos as $i => $producto)
                <tr class="fuente10">
                    <td class="borde center">{{ $i+1 }}</td>
                    <td class="borde center">{{ $producto->nombre_categoria }}</td>
                    <td class="borde center">{{ $producto->nombre_comercial }}</td>
                    <td class="borde center">{{ $producto->nombre_generico }}</td>
                    <td class="borde center">{{ $producto->detalle }}</td>
                    <td class="borde center">{{ $producto->proveedor }}</td>
                    <td class="borde center">{{ \Carbon\Carbon::parse($producto->fecha_ingreso)->format('d/m/Y') }}</td>
                    <td class="borde center">{{ $producto->stock }}</td>
                    <td class="borde right">{{ $producto->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/php">
        if (isset($pdf)) {
            $text = "{PAGE_NUM} - {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("Arial");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = $pdf->get_width() / 2;
            $y = $pdf->get_height() - 45;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
</body>
<style>
	@page {
		margin: 2cm;
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
	.fuente10 {
		font-size: 10px;
	}
	.fuente12 {
		font-size: 12px;
	}
	.fuente16 {
		font-size: 16px;
		text-decoration: underline;
	}
	.borde {
		border: 1px solid black;
	}
</style>
</html>
