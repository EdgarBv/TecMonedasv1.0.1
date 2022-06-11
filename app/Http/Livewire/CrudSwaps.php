<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\Swap;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CrudSwaps extends Component
{
    public $tickets, $swap_id, $ticket_id, $user_id, $invoice, $type_id, $expiration, $status;
    
    public function render()
    {
        $this->tickets = Ticket::all();
            return view('livewire.swaps/crud-swaps', ['swaps' => Swap::all()]);
    }
    
    public function mount() {
        $swap = Swap::all();
        $this->user_id = Auth::user()->id;
        $this->invoice = mt_rand(10000000, 99999999);
        $this->type_id = $swap[1]->id;
        $this->expiration = date("Y-m-d", strtotime("+1 day"));
        $this->status = 'activo';
        $this->tickets = Ticket::all();
    }

    public function store() {
        $this->validate([
            'invoice' => 'required',
            'expiration' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ]);
            
        Ticket::create([
            'invoice' => $this->invoice,
            'type_id' => $this->type_id,
            'expiration' => $this->expiration,
            'status' => $this->status,
            'user_id' => $this->user_id,
        ]);
        session()->flash('message', 'Ticket creado.');
        
    }
}
