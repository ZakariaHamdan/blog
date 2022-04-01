<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view ("sessions.create");
    }
    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|min:3|max:55',
            'password' => 'required'
        ]);

        if (! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'username' => 'you got denied boi'
            ]);
        }

        session()->regenerate(); // for session fixation

        return redirect('/')
            ->with('success','Welcome Back!');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')
            ->with('success','Logged out');
    }
}
