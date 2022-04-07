<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    Public function create(){
        return view('register.create');
    }
    public function store(){
        $attributes = request()->validate([
            'name' => 'required|max:55|min:5',
            'username' => 'required|min:3|max:20|unique:users,username',
            'email' => 'required|email|max:55|unique:users,email',
            'password' => 'required|min:7|max:100'
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/')
            ->with('success', 'Account Created');
    }
}
