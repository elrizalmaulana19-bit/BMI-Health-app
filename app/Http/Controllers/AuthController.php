<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $r)
    {
        $user = User::firstOrCreate(
            ['name' => $r->name],
            ['age' => $r->age, 'gender' => $r->gender, 'password' => bcrypt('123')]
        );

        Auth::login($user);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
