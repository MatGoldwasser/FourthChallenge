<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany(City::class); //esto hay que verlo bien, xq una airline va a muchas ciudades. crosa dijo q hay q hacer una tabla pivot
    }

}
