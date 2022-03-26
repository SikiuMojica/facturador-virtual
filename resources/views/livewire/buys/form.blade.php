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
                            <label for="">Fecha de Compra</label>
                                <input type="date" class="form-control" wire:model.defer="date">
                        </div>
                        
                        @error('date')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" wire:ignore>
                            <label for="">Nombre del Comprador</label>
                                <input type="text" class="form-control" wire:model.defer="user_name">
                        </div>
                        
                        @error('user_name')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input id="ph-number" type="text" class="form-control" placeholder="" wire:model.defer="user_phone">
                            
                        </div>
            
                        @error('user_phone')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>

                        <div class="col-md-4">
                            <div class="form-group" wire:ignore>
                                <label for="">Producto</label>
                                <select class="form-control selectpicker" wire:model.defer="product_id" data-live-search="true">
                                    <option value="">-- Producto/ Precio/ Impuesto --</option>
                                    @foreach ($products as $product_id)
                                        <option value="{{$product_id->id}}">{{$product_id->product_name}} Precio {{$product_id->product_price}} Impuesto {{$product_id->product_tax}}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            @error('product_id')
                                <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                        </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                                <input type="text" class="form-control" wire:model.defer="amount">
                        </div>
            
                        @error('amount')
                            <span class="alert alert-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                </div>
                    
    
@include('layouts.common.modalFooter')