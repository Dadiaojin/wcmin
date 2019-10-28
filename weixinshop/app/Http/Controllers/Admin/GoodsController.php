<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Goods;
use App\Http\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;
class GoodsController extends Controller
{
    //商品列表
    public function index(Request $request) {
        if($request->isMethod('get')){
        $data = Goods::with('category')->get();
      //  $data = Goods::all()->toArray();
      //  var_dump($data);
        return view('admin/goods/list', compact('data'));
        } else if($request->isMethod('post')){
            //ajax请求响应返回
           // $data = Goods::with('category')->get();
            //接收分页数据：起始位置和每页显示记录条数
            $offset = $request->input('start');
            $limit = $request->input('length');
           // $data = Goods::with('category')->offset($offset)->limit($limit)->get();
            //排序依据：order[0][column]	1；order[0][dir]	asc
            $columnid = $request->input('order.0.column');
            $orderway = $request->input('order.0.dir'); 
            //具体排序的字段
            $columnname = $request->input('columns.'.$columnid.'.data');
            //带有排序的分页数据
            $data = Goods::with('category')->offset($offset)->limit($limit)->orderBy($columnname,$orderway)->get();
            $count = Goods::count();  //记录总数
            return [
                "draw"=>$request->input('draw'),
                "recordsTotal"=>$count,
                "recordsFiltered"=>$count,
               "data"=>$data
            ];
        }
    }
    
    
     public function add(Request $request){
     if($request->isMethod('get')){
          $cat_id=Category::all();
          //var_dump($cat_id);
          return  view('admin/goods/goodsadd',compact('cat_id'));
     }
     elseif ($request->isMethod('post')) {
     //    var_dump($request->all());
         
         //自定义规则
         $rulues=[
             'goods_name'=>'required',
            'goods_desc'=>'required',
             'goods_price'=>'required|numeric',
             'stock'=>'required|numeric',
             
             ];
         
         //错误提示
         $msg=[
             'goods_name.required'=>'分类名称不能为空',
             'goods_desc.required'=>'分类名称介绍不能为空',
             'goods_price.required'=>'价格不能为空',
             'stock.required'=>'库存不能为空',
         ];
        
         $data=$request->all();
         $validator = Validator::make($data,$rulues,$msg);
         if($validator->passes()){
             Goods::create($data);
             return ['info'=>1];
         }else{
             $v = $validator->messages();//获取错误
             $error=  collect($v)->implode('0',',');
             return ['info'=>0,'error'=>$error];
         }
   }
 }
 
 public function uploadimg(Request $request){
   $file = $request->file('file');
    
    $filename="uploads/".$file->store('image','upload'); //返回上传文件路径 (filesystems.php 调整 upload)
    //$file->move($filename);
     return ['info'=>$filename];
    
  
 }
 
 public function update(Request $request){
     if($request->isMethod('get')){
         $cat_id=Category::all();
         $id=$request->goods;
         $goods=Goods::with('category')->where('id',$id)->first();
         //var_dump($goods->toArray());
          return  view('admin/goods/goodsupdate',compact('goods','cat_id')); 
         //var_dump($request->goods);
     }
     elseif ($request->isMethod('post')) {
         //定义规则
         $rules=[
             'goods_name'=>'required|min:2|unique:goods,goods_name,'.$request->goods,
             'goods_desc'=>'required|min:4',
              'goods_price'=>'required|numeric',
             'stock'=>'required|numeric',
         ];
         $msg=[
             'goods_name.required'=>'分类不能为空',
              'goods_desc.required'=>'概述不能为空',
             'goods_name.min'=>'分类至少2字',
             'goods_name.unique'=>'名称存在',
                 'goods_price.required'=>'价格不能为空',
             'stock.required'=>'库存不能为空',
             
         ];
          $id=$request->goods;
         $goods=Goods::where('id',$id)->first();
         $data=$request->all();
         //验证规则
         $validator=Validator::make($data,$rules,$msg);
         if($validator->passes()){
             
             //验证通过
             $old_goods_thumb=$goods->goods_thumb;
             $new_goods_thumb=$request->input('goods_thumb');
             if($old_goods_thumb!=$new_goods_thumb){
                 //说明修改了图
                 if($old_goods_thumb!=""){
                     //删旧图
                     $old_goods_thumb= str_replace('/uploads/','',$old_goods_thumb);
                     Storage::disk('upload')->delete($old_goods_thumb_thumb);
                     
                 }
             }
             unset($data["_token"]);
             Goods::where('id',$id)->update($data);
             return ['info'=>1];
         } else {
             $v=$validator->messages();
             //print_r($v)
             $error= collect($v)->implode('0', ',');
             return ['info'=>$error];
         }
         
         
         
     }
    
 }
 
  public function del(Request $request){
     $id=$request->id;
       $goods=Goods::where('id',$id)->first();
     $old_category_thumb=$goods->goods_thumb;
      if($old_category_thumb!=""){
                     //删旧图
         $old_category_thumb= str_replace('/uploads/','',$old_category_thumb);
         Storage::disk('upload')->delete($old_category_thumb);
                     
       }
     $del=Goods::where('id',$id)->delete();
     if($del){
         return ['info'=>1];
     }else{
         return ['info'=>0];
     }
 }
}
