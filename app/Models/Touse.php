<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Touse extends Model
{
    use Translatable;

    protected $translatable = ['title'];
}
