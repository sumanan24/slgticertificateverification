<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'reg_number', 'fullname','nic', 
    ];
}
