<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMIRecord extends Model
{
    use HasFactory;

    protected $table = 'bmi_records';

    protected $fillable = [
        'user_id',
        'height',
        'weight',
        'bmi',
        'category'
    ];
}