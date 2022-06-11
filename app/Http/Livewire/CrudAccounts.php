<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\Swap;
use App\Models\Account;
use App\Models\User;

class CrudAccounts extends Component
{
    public $buscador='';
    public $accounts, $account_id, $user_id, $account, $coins, $spent_coins, $active_account;
    public $updateMode = false;
    
    public function mount() {
        $this->accounts = Account::all();
        $this->user_id = Auth::user()->id;
        $this->account = strval(mt_rand(5500000000000000, 5599999999999999));
        $this->coins = 0;
        $this->active_account = 'true';
    }
    public function render()
    {
        return view('livewire.accounts/crud-accounts');
    }

    public function buscar() {
        $this->accounts = Account::where('account','like','%'.$this->buscador.'%')->get();
    }

    public function refresh() {
        return redirect(route('admin.view_accounts'));
    }

    public function create() {
        $this->resetInputFields();
        $this-> $updateMode = true;
    }

    private function resetInputFields() {
        $this->user_id = '';
        $this->account = '';
        $this->coins = '';
    }

    public function store() {
        $this->validate([
            'user_id' => 'required',
            'account' => 'required',
            'coins' => 'required',
        ]);
            
        Account::create([
            'user_id' => $this->user_id,
            'account' => $this->account,
            'coins' => $this->coins,
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'active_account' => $this->active_account,
            ]);
        }
        session()->flash('message', 'Cuenta creada');
        $this->resetInputFields();
        return redirect(route('swaps'));
    }

    public function edit($id) {
        $account = Account::findOrFail($id);
        $this->account_id = $id;
        $this->user_id = $account->user_id;
        $this->account = $account->account;
        $this->coins = $account->coins;
        
        $this->updateMode = true;
    }

    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'user_id' => 'required',
            'account' => 'required',
            'coins' => 'required',
        ]);
        if ($this->account_id) {
            $account = Account::find($this->account_id);
            $account->update([
                'user_id' => $this->user_id,
                'account' => $this->account,
                'coins' => $this->coins
            ]);
            session()->flash('message', 'Cuenta actualizada.');
            $this->resetInputFields();
            $this->cancel();
            $this->updateMode = false;
            return redirect(route('admin.view_accounts'));
        }
    }
    
    public function destroy($id) {
        if ($id) {
            $account = Account::where('id', $id);
            $account->delete();
        }
    }
}
