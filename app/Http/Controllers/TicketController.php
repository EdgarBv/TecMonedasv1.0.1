<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function view() {
        $this->authorize('view tickets');
        $tickets = Ticket::all();
        
        return view('admin/tickets', ['tickets'=>$tickets]);
    }

    // Generar ticket
    public function create() {
        $this->authorize('create tickets', $ticket);
        return redirect('admin/create');
    }
    public function store(Request $request) {
        $ticket = new Ticket;
        $ticket -> user_id = auth() -> user() -> id;
        $ticket -> invoice = $request -> folio;
        $ticket -> type = $request -> tipo;
        $ticket -> expiration = $request -> expiracion;
        $ticket -> status = $request -> estado;
        $ticket -> save();
        $this->authorize('store tickets', $ticket);

        return redirect('/swaps');
    }

    public function delete($id) { 
        $ticket = Ticket::findOrFail($id);
        $ticket -> delete();
        $this->authorize('delete tickets', $ticket);
        return redirect('/admin/tickets');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) { 
        $ticket = Ticket::findOrFail($id);

        $this->authorize('edit tickets', $ticket);
        return view('admin/edit-ticket', compact('ticket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id) { 
        $ticket = Ticket::findOrFail($id);
        $ticket -> invoice = $request -> folio;
        $ticket -> type = $request -> tipo;
        $ticket -> expiration = $request -> expiracion;
        $ticket -> status = $request -> estado;
        $ticket -> save();
        $this->authorize('update tickets', $ticket);
        return redirect() -> route('admin.view');
    }
}
