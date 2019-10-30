<?php

namespace App\Http\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    //
     protected  $table = 'admin';
    protected  $fillable = ['username','password','created_at','updated_at','remember_token','id'];
}
