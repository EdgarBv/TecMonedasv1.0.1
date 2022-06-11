<!-- Generar tickets (usuario) -->

<form class="formEdit">
    <div class="w-full">
        <div class="form-group">
            <label for="exampleFormControlInput1">User ID</label>
            <input type="text" class="form-control" wire:model="user_id" id="exampleFormControlInput1"
                placeholder="ID de usuario...">
        </div>
        <div class="form-group">
            <label for="invoice">Folio</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="invoice"
                placeholder="Folio...">
            @error('invoice') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput2">Tipo de canje</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tipo de canje..." wire:model="type_id">
            @error('type_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput3">Expiración</label>
            <input type="date" class="form-control" id="exampleFormControlInput3" wire:model="expiration"
                placeholder="Fecha de expiración...">
            @error('expiration') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlInput4">Estado</label>
            <input type="text" class="form-control" id="exampleFormControlInput4" wire:model="status"
                placeholder="Estado del ticket...">
            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
            <div class="text-center button-group">
                <button wire:click.prevent="store()" class="btn log mt-4">Agregar
                    ticket</button>
            </div>
        </div>
</form>