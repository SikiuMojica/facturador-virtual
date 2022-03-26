<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-four">
        <div class="page-header">
            <div class="page-title">
                <h3>PRODUCTOS</h3>
            </div>
            <div class="dropdown filter custom-dropdown-icon">
                <a href="javascript:void(0)" class="btn btn-outline-warning mb-2" data-toggle="modal" data-target="#theModal">
                    Nuevo Producto</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered mb-4">
                <thead style="background-color: #1b2e4b">
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">nombre del producto</th>
                        <th class="text-center">precio del Producto</th>
                        <th class="text-center">impuesto</th>
                        <th class="text-center">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productData as $product)
                        <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td class="text-center">{{$product->product_name}}</td>
                            <td class="text-center">{{$product->product_price}}</td>
                            <td class="text-center">{{$product->product_tax}}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" wire:click="Edit({{$product->id}})" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="Confirm({{$product->id}})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$productData->links()}}
        </div>
    @include('livewire.product.form')
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        })
        window.livewire.on('product-add', msg => {
            $('#theModal').modal('hide')
            notification(msg)
        })
        window.livewire.on('product-delete', msg => {
            notification(msg,2)
        })
        window.livewire.on('product-update', msg => {
            $('#theModal').modal('hide')
            notification(msg)
        })
    })

    function Confirm(id) {

        swal({
            title: 'CONFIRMAR',
            text: 'Desea eliminar el producto?',
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


