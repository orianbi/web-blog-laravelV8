<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterContoroller extends Controller
{
    public function index(){
        return view('auth.register',[
                'title' => 'Register'
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil!');

    }
}
