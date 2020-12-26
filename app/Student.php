<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
            'email',
            'address',
            'mobile',
            'fullname',
            'nid',
            'image'
        ];
}
