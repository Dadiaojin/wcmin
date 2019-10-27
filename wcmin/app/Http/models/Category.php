<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='id';
    protected $fillable=['cat_name','cat_desc','cat_thumb','id','created_at','update_at'];
    //配置与goods的关系是一对多的关系
    public function goods(){
        return $this->hasMany('App\Http\models\Goods','cat_id','id');
    }
}
