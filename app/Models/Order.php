<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'user_id', 'zapros_id', 'ktam', 'kstanam', 'email', 'phone', 'ktam_kashelok', 'kstanam_kashelok', 'poxanakum'
    ];
}
