<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Valute extends Model
{
    public function costs(){
        return $this->hasMany(ValuteCost::class, 'from_valute', 'id');
    }
}
