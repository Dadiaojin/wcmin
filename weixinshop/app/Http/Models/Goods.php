<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected  $table = 'goods';
    protected  $fillable = ['goods_name','goods_price','goods_desc','goods_thumb','cat_id','stock','is_hot'];
    
    //配置跟分类表的关系，一对一的联系
    public function category() {
        return $this->hasOne('App\Http\Models\Category','id','cat_id');
    }
}
