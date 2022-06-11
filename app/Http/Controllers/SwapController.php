<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Swap;
use App\Models\Ticket;
use App\Models\Award;
use App\Models\Account;
use App\Models\User;
use DB;

class SwapController extends Controller
{
    public function viewS() {
        $swaps = Swap::all();
        $user = auth() -> user();

        return view('swaps', ['swaps'=>$swaps, 'user' => $user]);
    }
}
