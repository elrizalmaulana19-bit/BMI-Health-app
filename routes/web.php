<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BMIController;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', function (Request $req) {

    $req->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'gender' => 'required|in:L,P'
    ]);

    $user = User::firstOrCreate(
        [
                    'name' => $req->name,
                    'age' => $req->age,
                    'gender' => $req->gender
        ],
        [
                    'name' => $req->name,
                    'age' => $req->age,
                    'gender' => $req->gender
        ]
    );

    session(['user_id' => $user->id]);

    return redirect('/dashboard');
});

Route::get('/dashboard', [BMIController::class,'dashboard']);
Route::get('/bmi', [BMIController::class,'form']);
Route::post('/hitung', [BMIController::class,'hitung']);