<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_course extends Model
{
    protected $fillable = [
        'sid','cid','certificate_no','batch','start_date','end_date', 
    ];
}
