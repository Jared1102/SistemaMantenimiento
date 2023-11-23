<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        /*User::create([
            'name'=>'Jared',
            'username'=>'Jared',
            'email'=>'cacahuate.1895@gmail.com',
            'password'=>Hash::make('12345678')
        ]);*/
        return view('auth.login');
    }
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(!auth()->attempt($request->only('username', 'password'))) //Variable de sesion
        {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }
        return redirect()->route('MuroIndex');
    }
}
