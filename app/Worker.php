<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class Worker extends Auth
{
    //
    protected $fillable=['name','email','password'];
}
