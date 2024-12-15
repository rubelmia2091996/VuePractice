<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Models\User;

class AuthController extends Controller
{
    public function store(Request $request){
        $feilds = $request->validate([
            'name'=> ['required', 'max: 255'],
            'email'=> ['required','email', 'unique:users', 'max: 255'],
            'password'=> ['required', 'confirmed']
        ]);
        $user = User::create($feilds);
        Auth::login($user);
        return redirect()->route('home');
    }
}
