<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Mail\AccountCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserRegisterController extends Controller
{

    public function index(){
        return view('frontend.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|password|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $insert = new User();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->password = bcrypt($request->password_confirmation);
        $insert->role = 2;

        $insert->save();

        Mail::to($request->email)->send(new AccountCreate($insert));
        return back()->with('success', 'User Account Created!');
    }    
}
