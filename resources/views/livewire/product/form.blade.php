

<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <b>{{$selected_id > 0 ? 'EDITAR' : 'CREAR'}} | {{$componentName}}</b>
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    POR FAVOR ESPERE
                </h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" wire:ignore>
                            <label for="">Nombre del Producto</label>
                                <input type="text" class="form-control" wire:model.defer="product_name">
                        </div>
                        
                        @error('product_name')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Precio del Producto</label>
                                <input type="number" class="form-control" wire:model.defer="product_price">
                        </div>
            
                        @error('product_price')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Impuesto</label>
                                <input type="number" class="form-control" wire:model.defer="product_tax">
                        </div>
            
                        @error('product_tax')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                    
    
@include('layouts.common.modalFooter')