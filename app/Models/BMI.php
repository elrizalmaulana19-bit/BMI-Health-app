<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    protected $fillable = [
        'tinggi',
        'berat',
        'bmi',
        'kategori'
    ];
}