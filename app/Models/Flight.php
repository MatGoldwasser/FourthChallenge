<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['airline', 'origin_id', 'arrival_id', 'takeoff_time', 'arrival_time'];
}
