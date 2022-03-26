<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="col-sm-12">
        <div class="widget widget-four">
            <div class="widget-heading">
                <h4 class="card-title text-center">
                    <b>{{$componentName}}</b>
                </h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{url('reporte/pdf' . '/' . $buysType . '/' . $buysFrom . '/' . $buysTo)}}" class="btn btn-dark btn-block {{count($invoiceData) < 1 ? 'disabled' : ''}}" target="_blank">
                                    Generar PDF
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <!-- TABLE -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-1">
                                <thead class="text-white" style="background-color: #1b2e4b">
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">fecha de compra</th>
                                        <th class="text-center">nombre del comprador</th>
                                        <th class="text-center">telefono del comprador</th>
                                        <th class="text-center">nombre del producto</th>
                                        <th class="text-center">precio del producto</th>
                                        <th class="text-center">Impuesto</th>
                                        <th class="text-center">cantidad</th>
                                        <th class="text-center">nombre del usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($invoiceData->count())
                                            @foreach ($invoiceData as $date)
                                                <tr>
                                                    <td class="text-center">{{$date->id}}</td>
                                                    <td class="text-center">
                                                        {{\Carbon\Carbon::parse($date->dateid)->format('d-m-Y')}}
                                                    </td>
                                                        <td class="text-center">{{$date->username}}</td>
                                                        <td class="text-center">{{$date->userphone}}</td>
                                                        <td class="text-center">{{$date->productName}}</td>
                                                        <td class="text-center">{{$date->productPrice}}</td>
                                                        <td class="text-center">{{$date->productTax}}</td>
                                                        <td class="text-center">{{$date->amountid}}</td>
                                                        <td class="text-center">{{$date->userName}}</td>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="8">NO HAY RESULTADOS</td>
                                        </tr>
                                    @endif   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementsByClassName('flatpickr'),{
            enableTime: false,
            buysFormat: 'Y-m-d',
            locale: {
                    firstDayofWeek: 1,
                    weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ]
                },
                months: {
                    shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                    ],
                    longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                    ],
                },
            }
        })

    })
</script>
