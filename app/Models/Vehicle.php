<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_manufacturer',
        'car_model',
        'car_board',
    ];

    protected $casts = [
        'car_manufacturer' => 'string',
        'car_model' => 'string',
        'car_board' => 'string',
    ];
}
