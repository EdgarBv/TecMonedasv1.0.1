<form>
    <div class="w-full">
        <div class="form-group">
            <input type="hidden" wire:model="ticket_id">
            <label for="exampleFormControlInput1">Folio</label>
            <input type="text" class="form-control" wire:model="invoice" id="exampleFormControlInput1"
                readonly="readonly">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Tipo de canje</label>
            <input type="text" class="form-control" wire:model="type" id="exampleFormControlInput2" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Expiración</label>
            <input type="date" class="form-control" wire:model="expiration" id="exampleFormControlInput3">
            @error('expiration') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Estado</label>
            <select name="status" id="exampleFormControlInput4" class="form-control" wire:model="status">
                <option value="activo">activo</option>
                <option value="inactivo">inactivo</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="text-center button-group">
            <button wire:click.prevent="update()" class="has-text-white m-2 has-background-dark p-2">Actualizar</button>
            <button wire:click.prevent="cancel()" class="has-text-white m-2 has-background-dark p-2">Cancelar</button>
        </div>
    </div>

</form>