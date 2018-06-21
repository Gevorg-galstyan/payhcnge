<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class LastPay extends Model
{
    public function from_valute_relation(){
        return $this->belongsTo(Valute::class, 'from_valut', 'id');
    }

    public function to_valute_relation(){
        return $this->belongsTo(Valute::class, 'to_valute', 'id');
    }
}
