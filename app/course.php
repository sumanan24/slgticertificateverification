<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'code', 'name','nvq', 'department', 
    ];

    protected $rules = [
        'code' => 'required|unique:courses|max:3|min:3',
        'name' => 'required',
        'nvq' => 'required',
        'department' => 'required',
    ];
}
