<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\Swap;
use App\Models\User;

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
        return view('livewire.tickets/crud-tickets');
    }

    public function buscar() {
        $this->tickets = Ticket::where('invoice','like','%'.$this->buscador.'%')->get();
    }

    public function refresh() {
        return redirect(route('admin.view_tickets'));
    }

    private function resetInputFields() {
        $this->ticket_id = '';
        $this->user_id = '';
        $this->invoice = '';
        $this->type_id = '';
        $this->expiration = '';
        $this->status = '';
    }

    public function edit($id) {
        $ticket = Ticket::findOrFail($id);
        $this->ticket_id = $id;
        $this->user_id = $ticket->user_id;
        $this->invoice = $ticket->invoice;
        $this->type_id = $ticket->type_id;
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
            'type_id' => 'required',
            'expiration' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);
        if ($this->ticket_id) {
            $ticket = Ticket::find($this->ticket_id);
            $ticket->update([
                'invoice' => $this->invoice,
                'type_id' => $this->type_id,
                'expiration' => $this->expiration,
                'status' => $this->status,
                'user_id' => $this->user_id
            ]);
            session()->flash('message', 'Ticket actualizado.');
            $this->resetInputFields();
            $this->cancel();
            $this->updateMode = false;
            return redirect(route('admin.view_tickets'));
        }
    }
    
    public function destroy($id) {
        if ($id) {
            $ticket = Ticket::where('id', $id);
            $ticket->delete();
        }
    }
}