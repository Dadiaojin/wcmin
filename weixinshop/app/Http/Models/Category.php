<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected  $table = 'category';
    protected  $fillable = ['cat_name','cat_desc','cat_thumb'];
    //配置与goods的关系，是一对多的联系
    public function goods() {
        return $this->hasMany('App\Http\Models\Goods','cat_id','id');
    }
}
