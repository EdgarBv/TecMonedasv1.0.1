<!-- Actualizar Tickets (Administrador) -->

<form class="formEdit">
    <div class="w-full">
        <div class="form-group">
            <input wire:model="ticket_id">
            <label for="exampleFormControlInput1">Folio</label>
            <input type="text" class="form-control" wire:model="invoice" id="exampleFormControlInput1"
                readonly="readonly">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Tipo de canje</label>
            <input type="text" class="form-control" wire:model="type" id="exampleFormControlInput2" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Expiraci贸n</label>
            <input type="date" class="form-control" wire:model="expiration" id="exampleFormControlInput3">
            @error('expiration') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Estado</label>
            <select style="padding: 7.5px !important;" name="status" id="exampleFormControlInput4" class="form-control" wire:model="status">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="text-center button-group">
            <button wire:click.prevent="update()" class="btn log mt-4">Actualizar</button>
            <button wire:click.prevent="cancel()" class="btn log mt-4">Cancelar</button>
        </div>
    </div>

</form>