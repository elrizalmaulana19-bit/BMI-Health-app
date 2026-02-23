<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BMIRecord;

class BMIController extends Controller
{
    public function form()
    {
        return view('bmi'); 
    }

    public function dashboard()
    {
        $records = BMIRecord::where('user_id', session('user_id'))
            ->latest()
            ->get();

        $latest = $records->first();

        return view('dashboard', compact('records','latest'));
    }
    public function index()
    {
        $records = BMIRecord::where('user_id', session('user_id'))
            ->latest()
            ->get();

        return view('bmi', compact('records'));
    }

    public function hitung(Request $req)
    {
        $height = $req->tinggi / 100;
        $weight = $req->berat;

        $bmi = $weight / ($height * $height);

        if ($bmi < 18.5) $kategori = 'Kurus';
        elseif ($bmi < 25) $kategori = 'Normal';
        elseif ($bmi < 30) $kategori = 'Gemuk';
        else $kategori = 'Obesitas';

        $color = $this->kategoriColor($kategori);
        BMIRecord::create([
            'user_id' => session('user_id'),
            'height' => $req->tinggi,
            'weight' => $req->berat,
            'bmi' => round($bmi, 1),
            'category' => $kategori
    
        ]);

        $records = BMIRecord::where('user_id', session('user_id'))
            ->latest()
            ->get();

            return view('bmi', [
            'bmi' => round($bmi, 1),
            'kategori' => $kategori,
            'color' => $color,
            'records' => $records
            ]);
        }
    private function kategoriColor($kategori)
        {
            return match($kategori) {
                'Kurus' => 'blue',
                'Normal' => 'green',
                'Gemuk' => 'orange',
                'Obesitas' => 'red',
            default => 'gray'
            };
        }
}