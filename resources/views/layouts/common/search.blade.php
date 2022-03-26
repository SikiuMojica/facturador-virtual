<div class="row justify-content-between mt-2">
    <div class="form-group row mb-4 ml-2">
        <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Mostar</label>
        <div class="col-xl-10 col-lg-9 col-sm-10">
            <select wire:model="pagination" class="mx-2 form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text input-gp">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <input type="text" wire:model="search" placeholder="Buscar" class="form-control">
        </div> 
    </div>
</div>