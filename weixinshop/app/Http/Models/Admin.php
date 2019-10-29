<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
     protected  $table = 'admin';
    protected  $fillable = ['username','password','created_at','updated_at','remember_token','id'];
}
