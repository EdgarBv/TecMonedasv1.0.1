<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Ticket;
use Image;

class UserController extends Controller
{
    public function view() {
        $user = User::find(Auth::User()->id);
        
        return view('user/perfil', ['user'=>$user]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit() { 
        $user = User::find(Auth::User()->id);
        return view('user/edit', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request) { 
        $user = User::find(Auth::User()->id);
        $user -> name = $request -> name;
        $user -> date_of_birth = $request -> date_of_birth;
        $user -> career = $request -> career;
        $user -> email = $request -> email;
        $user -> save();

        // if ($request->hasFile('photo')) {
        //     $photo = $request->file('photo');
        //     $filename = time() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->resize(300, 300)->save(public_path('uploads/photos/' . $filename));

        //     $user = Auth::user();
        //     $user->photo = $filename;
        //     $user->save();
        // }
        session()->flash('message', 'Perfil actualizado');
        return redirect() -> route('perfil');
    }
}