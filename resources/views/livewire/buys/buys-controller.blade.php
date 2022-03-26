<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-four">
        <div class="page-header">
            <div class="page-title">
                <h3>COMPRAS</h3>
            </div>
            <div class="dropdown filter custom-dropdown-icon">
                <a href="javascript:void(0)" class="btn btn-outline-warning mb-2" data-toggle="modal" data-target="#theModal">
                    Nueva Compra</a>
            </div>
            
        </div>

        <div class="table-responsive">
            <table class="table table-bordered mb-4">
                <thead style="background-color: #1b2e4b">
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">fecha de compra</th>
                        <th class="text-center">nombre del comprador</th>
                        <th class="text-center">telefono del comprador</th>
                        <th class="text-center">nombre del producto</th>
                        <th class="text-center">precio del producto</th>
                        <th class="text-center">Impuesto</th>
                        <th class="text-center">cantidad</th>
                        <th class="text-center">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buysData as $buys)
                        <tr>
                            <td class="text-center">{{$buys->id}}</td>
                            <td class="text-center">{{$buys->date}}</td>
                            <td class="text-center">{{$buys->user_name}}</td>
                            <td class="text-center">{{$buys->user_phone}}</td>
                            <td class="text-center">{{$buys->productname}}</td>
                            <td class="text-center">{{$buys->productprice}}</td>
                            <td class="text-center">{{$buys->producttax}}</td>
                            <td class="text-center">{{$buys->amount}}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" wire:click="Edit({{$buys->id}})" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="Confirm({{$buys->id}})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            {{$buysData->links()}}
        </div>
    @include('livewire.buys.form')
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        })
        window.livewire.on('buys-add', msg => {
            $('#theModal').modal('hide')
            notification(msg)
        })
        window.livewire.on('buys-delete', msg => {
            notification(msg,2)
        })
        window.livewire.on('buys-update', msg => {
            $('#theModal').modal('hide')
            notification(msg)
        })
    })

    function Confirm(id) {

        swal({
            title: 'CONFIRMAR',
            text: 'Desea eliminar la Compra?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value) {
                window.livewire.emit('destroy', id)
                //swal.close()
            }
        })
    }

</script>


