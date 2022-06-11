<form class="formEdit">
    <div class="w-full">
        <div class="form-group">
            <input type="hidden" wire:model="user_id">
            <label for="exampleFormControlInput1">Nombre</label>
            <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Fecha nacimiento</label>
            <input type="date" class="form-control" wire:model="date_of_birth" id="exampleFormControlInput2">
            @error('date_of_birth') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Carrera</label>
            <select style="padding: 7.5px !important;" name="career" id="exampleFormControlInput4" class="form-control" wire:model="career">
                <option selected></option>
                <option value="isc">Ingeniería en Sistemas Computacionales</option>
                <option value="ie">Ingeniería Electrónica</option>
                <option value="iem">Ingeniería Electromecánica</option>
                <option value="ier">Ingeniería en Energías Renovables</option>
                <option value="ii">Ingeniería Industrial</option>
            </select>
            @error('career') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Correo</label>
            <input type="text" class="form-control" wire:model="email" id="exampleFormControlInput3">
            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="text-center button-group">
            <button wire:click.prevent="update()" class="btn log mt-4">Actualizar</button>
            <button wire:click.prevent="cancel()" class="btn log mt-4">Cancelar</button>
        </div>
    </div>

</form>