<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\Swap;
use App\Models\Account;
use App\Models\User;

class CrudUsers extends Component
{
    public $buscador='';
    public $users, $user_id, $name, $date_of_birth, $career, $email;
    public $updateMode = false;
    
    public function mount() {
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.users/crud-users');
    }

    public function buscar() {
        $this->users = User::where('name','like','%'.$this->buscador.'%')->get();
    }

    public function refresh() {
        return redirect(route('admin.view_users'));
    }

    // public function create() {
    //     $this->resetInputFields();
    //     $this->openModal();
    // }

    private function resetInputFields() {
        $this->user_id = '';
        $this->name = '';
        $this->date_of_birth = '';
        $this->career = '';
        $this->email = '';
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->date_of_birth = $user->date_of_birth;
        $this->career = $user->career;
        $this->email = $user->email;
        
        $this->updateMode = true;
    }

    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'career' => 'required',
            'email' => 'required',
        ]);
        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'date_of_birth' => $this->date_of_birth,
                'career' => $this->career,
                'email' => $this->email
            ]);
            session()->flash('message', 'Usuario actualizado.');
            $this->resetInputFields();
            $this->cancel();
            $this->updateMode = false;
            return redirect(route('admin.view_users'));
        }
    }
    
    public function destroy($id) {
        if ($id) {
            $user = User::where('id', $id);
            $user->delete();
        }
    }
}
