<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='id';
    protected $fillable=['cat_name','cat_desc','cat_thumb','id','created_at','update_at'];
}
