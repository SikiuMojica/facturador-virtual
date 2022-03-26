<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FACTURADOR</title>
    <link rel="stylesheet" href="{{asset('css/custom_pdf.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_page.css')}}">
</head>
<body>
    <section class="header" style="top: -287px;">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" class="text-center">
                    <span style="font-size: 25px; font-weight: bold;">
                        FACTURADOR VIRTUAL
                    </span>
                </td>
            </tr>
            <tr>
                <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px;">
                    @if ($buysType == 0)
                        <span style="font-size: 16px">
                            <strong>Reporte Factura del dia</strong>
                        </span>
                    @else
                        <span style="font-size: 16px">
                            <strong>Reporte Factura por fecha</strong>
                        </span>
                    @endif
                    <br>
                    @if ($buysType != 0)
                        <span style="font-size: 16px">
                            <strong>Fecha de consulta: {{$buysFrom}} al {{$buysTo}}</strong>
                        </span>
                    @else
                        <span style="font-size: 16px">
                            <strong>Fecha de consulta: {{\Carbon\Carbon::now()->format('d-m-Y')}}</strong>
                        </span>
                    @endif
                    <br>
                </td>
            </tr>
        </table>
    </section>

    <section style="margin-top: -110px">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="12%">FECHA DE COMPRA</th>
                    <th width="10%">NOMBRE COMPRADOR</th>
                    <th width="12%">TELEFONO COMPRADOR</th>
                    <th width="10%">NOMBRE PRODUCTO</th>
                    <th width="12%">PRECIO</th>
                    <th width="10%">IMPUESTO</th>
                    <th width="12%">CANTIDAD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoiceData as $item)
                    <tr>
                        <td align="center">{{\Carbon\Carbon::parse($item->dateid)->format('d-m-Y')}}</td>
                        <td align="center">{{$item->username}}</td>
                        <td align="center">{{$item->userphone}}</td>
                        <td align="center">{{$item->productName}}</td>
                        <td align="center">{{$item->productPrice}}</td>
                        <td align="center">{{$item->productTax}}</td>
                        <td align="center">{{$item->amountid}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="20%">
                    <span>Facturador</span>
                </td>
                <td class="text-center" width="60%">
                    citas
                </td>
                <td width=20% class="text-center">
                    Pagina <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>