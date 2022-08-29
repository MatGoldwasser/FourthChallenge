<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function flights_arriving()
    {
        return $this->hasMany(Flight::class);
    }

    public function flights_departure()
    {
        return $this->hasMany(Flight::class);
    }

    public function airline()
    {
        return $this->hasMany(City::class);
    }
}
