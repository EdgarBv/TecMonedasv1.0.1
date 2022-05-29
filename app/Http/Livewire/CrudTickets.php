<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use App\Models\Ticket;

class CrudTickets extends Component
{
    public $buscador='';
    public $tickets, $ticket_id, $user_id, $invoice, $type, $expiration, $status;
    public $updateMode = false;
    
    public function mount() {
        $this->tickets = Ticket::all();
    }

    public function render()
    {
        // $this->tickets = Ticket::all();
        return view('livewire.crud-tickets');
    }

    public function buscar() {
        $this->tickets = Ticket::where('invoice','like','%'.$this->buscador.'%')->get();
    }

    public function refresh() {
        return redirect(route('admin.view'));
    }

    // public function create() {
    //     $this->resetInputFields();
    //     $this->openModal();
    // }

    public function openModal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }
    private function resetInputFields() {
        $this->ticket_id = '';
        $this->user_id = '';
        $this->invoice = '';
        $this->type = '';
        $this->expiration = '';
        $this->status = '';
    }

    // public function store() {
    //     $this->validate([
    //         'invoice' => 'required',
    //         'type' => 'required',
    //         'expiration' => 'required',
    //         'status' => 'required',
    //         'user_id' => 'required',
    //     ]);
            
    //     Ticket::create([
    //         'invoice' => $this->invoice,
    //         'type' => $this->type,
    //         'expiration' => $this->expiration,
    //         'status' => $this->status,
    //         'user_id' => $this->user_id,
    //     ]);
    //     session()->flash('message', 'Ticket creado.');
    //     $this->resetInputFields();
    // }

    public function edit($id) {
        $ticket = Ticket::findOrFail($id);
        $this->ticket_id = $id;
        $this->user_id = $ticket->user_id;
        $this->invoice = $ticket->invoice;
        $this->type = $ticket->type;
        $this->expiration = $ticket->expiration;
        $this->status = $ticket->status;
        
        $this->updateMode = true;
    }

    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'invoice' => 'required',
            'type' => 'required',
            'expiration' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);
        if ($this->ticket_id) {
            $ticket = Ticket::find($this->ticket_id);
            $ticket->update([
                'invoice' => $this->invoice,
                'type' => $this->type,
                'expiration' => $this->expiration,
                'status' => $this->status,
                'user_id' => $this->user_id
            ]);
            session()->flash('message', 'Ticket actualizado.');
            $this->resetInputFields();
            $this->cancel();
            $this->updateMode = false;
            return redirect(route('admin.view'));
        }
    }
    
    public function destroy($id) {
        if ($id) {
            $ticket = Ticket::where('id', $id);
            $ticket->delete();
        }
    }
}







    //CRUD
    // public function create()
    // {
    //     $this->resetCreateForm();
    //     $this->openModalPopover();
    // }
    // public function openModalPopover()
    // {
    //     $this->isModalOpen = true;
    // }
    // public function closeModalPopover()
    // {
    //     $this->isModalOpen = false;
    // }
    // private function resetCreateForm(){
    //     $this->invoice = '';
    //     $this->type = '';
    //     $this->expiration = '';
    //     $this->status = '';
    // }
    
    // public function store()
    // {
    //     $this->validate([
    //         'invoice' => 'required',
    //         'type' => 'required',
    //         'expiration' => 'required',
    //         'status' => 'required',
    //     ]);
    
    //     Ticket::updateOrCreate(['id' => $this->ticket_id], [
    //         'invoice' => $this->invoice,
    //         'type' => $this->type,
    //         'expiration' => $this->expiration,
    //         'status' => $this->status,
    //     ]);
    //     session()->flash('message', $this->ticket_id ? 'Ticket actualizado.' : 'Ticket creado.');
    //     $this->closeModalPopover();
    //     $this->resetCreateForm();
    // }