<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Account;
use App\Models\Swap;
use Session;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function viewM() {
        $tickets = Ticket::all();
        $user = auth()->user();
        
        return view('my-tickets', ['tickets'=>$tickets, 'user'=>$user]);
    }

    // Generar ticket
    public function create() {
        // $this->authorize('create tickets', $ticket);
        return redirect('admin/create');
    }
    public function store(Request $request) {
        $ticket = new Ticket;
        $ticket -> user_id = auth() -> user() -> id;
        $ticket -> invoice = $request -> folio;
        $ticket -> type_id = $request -> tipo;
        $ticket -> expiration = $request -> expiracion;
        $ticket -> status = $request -> estado;

        if ($request -> tipo == 1) {
            DB::table('accounts')
                -> where('id', $ticket->user_id) 
                -> decrement('coins', 100);
            $ticket -> save();
            $this->authorize('store tickets', $ticket);
            Session::flash('message','Canje realizado con éxito.');
            return redirect() -> route('swaps');
        }
        elseif ($request -> tipo == 2) {
            DB::table('accounts')
                -> where('id', $ticket->user_id) 
                -> decrement('coins', 200);
            $ticket -> save();
            $this->authorize('store tickets', $ticket);
            Session::flash('message','Canje realizado con éxito.');
            return redirect() -> route('swaps');
        }

        elseif ($request -> tipo == 3) {
            DB::table('accounts')
                -> where('id', $ticket->user_id) 
                -> decrement('coins', 500);
            $ticket -> save();
            $this->authorize('store tickets', $ticket);
            Session::flash('message','Canje realizado con éxito.');
            return redirect() -> route('swaps');
        }
        elseif ($request -> tipo == 4) {
            DB::table('accounts')
                -> where('id', $ticket->user_id) 
                -> decrement('coins', 2000);
            $ticket -> save();
            $this->authorize('store tickets', $ticket);
            Session::flash('message','Canje realizado con éxito.');
            return redirect() -> route('swaps');
        }
        elseif ($request -> tipo == 5) {
            DB::table('accounts')
                -> where('id', $ticket->user_id) 
                -> decrement('coins', 30000);
            $ticket -> save();
            $this->authorize('store tickets', $ticket);
            Session::flash('message','Canje realizado con éxito.');
            return redirect() -> route('swaps');
        }
        else {
            Session::flash('message','No se puede canjear, no tienes suficientes tecmonedas.');
            return redirect() -> route('swaps');
        }
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
        $ticket -> type_id = $request -> tipo;
        $ticket -> expiration = $request -> expiracion;
        $ticket -> status = $request -> estado;
        $ticket -> save();
        $this->authorize('update tickets', $ticket);
        return redirect() -> route('admin.view');
    }
}
