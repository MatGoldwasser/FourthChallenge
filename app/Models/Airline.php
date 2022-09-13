<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function city(){
        return $this->hasMany(City::class);
    }

    public function flight(){
        return $this->hasMany(Flight::class);
    }

}
