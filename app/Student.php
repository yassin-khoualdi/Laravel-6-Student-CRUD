<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['firstname', 'lastname', 'gender', 'country', 'city', 'address'];
    protected $primaryKey = 'id';
}
