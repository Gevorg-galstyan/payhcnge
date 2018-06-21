<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Change extends Model
{
   public function icon(){
       return $this->belongsTo(Valute::class, 'logo', 'id');
   }
}
