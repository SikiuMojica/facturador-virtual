    </div>
            <div class="modal-footer">
                <button class="btn" wire:click.prevent="ResetData()" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cerrar</button>

                @if ($selected_id < 1)
                    <button type="button" class="btn btn-primary" wire:click.prevent="Store()">Guardar</button>
                @else  
                    <button type="button" class="btn btn-primary" wire:click.prevent="Update()">Actualizar</button>
                @endif

            </div>
        </div>
    </div>
</div>