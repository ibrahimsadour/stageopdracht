<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = "students";
    protected $fillable = [


        'id',
        'titel',
        'prioriteit',
        'status',
        'created_at',
        'updated_at',


    ];
}
