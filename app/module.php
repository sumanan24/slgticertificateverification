<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    protected $fillable = [
        'name','c_code','semi', 
    ];
}
