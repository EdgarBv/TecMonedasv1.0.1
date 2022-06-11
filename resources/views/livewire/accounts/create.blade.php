<!-- Abrir cuenta (Usuario) -->

<form class="">
    <div class="">
        <div class="form-group hidden">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" value="{{ Auth::user()->id }}" id="exampleFormControlInput1" wire:model="user_id">
            @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group hidden">
            <label for="account"># Cuenta</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="account">
            @error('account') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group hidden">
        <label for="coins">Monedas</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" wire:model="coins" value="0">
            @error('coins') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="button-group">
            <button wire:click.prevent="store()" class="btn log mt-4">Abrir cuenta</button>
        </div>
    </div>
</form>