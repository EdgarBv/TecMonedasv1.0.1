<form>
    <div id="createModal" class="modalContainer">
        <span class="close2">×</span>
        <div class="form-group">
            <label for="invoice">Folio</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="invoice"
                value="<?php print mt_rand(10000000, 99999999) ?>" placeholder="Folio...">
            @error('invoice') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Tipo de canje</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="type"
                placeholder="Tipo de canje...">
            @error('type') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Expiración</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" wire:model="expiration"
                placeholder="Fecha de expiración...">
            @error('expiration') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Estado</label>
            <input type="text" class="form-control" id="exampleFormControlInput4" wire:model="status"
                placeholder="Estado del ticket...">
            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button wire:click.prevent="store()" class="has-background-white p-2 m-3">Agregar ticket</button>
    </div>
</form>