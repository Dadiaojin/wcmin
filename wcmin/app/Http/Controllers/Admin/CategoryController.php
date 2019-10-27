<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
class CategoryController extends Controller
{
    public function index(){
         return  view('Admin/index/category');
    }
    public function indexlist(){
        
        $data=Category::all();
        
        
        
        
        return  view('Admin/index/categorylist',compact('data'));
    }
    
    
  /*  public function add(Request $request){
        
        
        
        
        if(!empty($request['cat_name'])&&!empty($request['cat_desc'])){ 
           
          $this->validate($request, [
           'cat_name'=>'required',
            'cat_desc'=>'required'
                       
        ]);
          
          
            
           $post=$request->all();
          // var_dump($post);
           $name=$post['cat_name'];
           $resume=$post['cat_desc'];
            $photo= $request->file('cat_thumb');
            
              if($request->hasFile('cat_thumb')&&$photo->isValid()){
              //获取文件名后缀
              $ext = $photo->getClientOriginalExtension();
              //获取文件原名
              $oldname = $photo->getClientOriginalName();
              //创建新文件名称
              $newname = uniqid().date('Y-m-d-H-i-s').rand(10,99).".".$ext;
              //移动方法：move()
              $photo->move('./uploads/image/',$newname);
              //储存路径
              $post['cat_thumb'] = './uploads/image/'.$newname;
          }
           
            $res=Category::create($post);
           if($res){
               echo '添加成功！';
               
               //var_dump($res);
            }  else {
                //var_dump($res);
                 return  view('Admin/index/categoryadd'); 
               
            }
       
        }else{
           return  view('Admin/index/categoryadd'); 
        }
        
    }*/
    
 public function add(Request $request){
     if($request->isMethod('get')){
          return  view('Admin/index/categoryadd');
     }
     elseif ($request->isMethod('post')) {
     //    var_dump($request->all());
         
         //自定义规则
         $rulues=[
             'cat_name'=>'required',
            'cat_desc'=>'required'
             ];
         
         //错误提示
         $msg=[
             'cat_name.required'=>'分类名称不能为空',
             'cat_desc.required'=>'分类名称介绍不能为空'
         ];
        
         $data=$request->all();
         $validator = Validator::make($data,$rulues,$msg);
         if($validator->passes()){
             Category::create($data);
             return ['info'=>1];
         }else{
             $v = $validator->messages();//获取错误
             $error=  collect($v)->implode('0',',');
             return ['info'=>0,'error'=>$error];
         }
   }
 }
 
 //处理文件上传
 public function uploadimg(Request $request){
   $file = $request->file('file');
    
    $filename="uploads/".$file->store('image','upload'); //返回上传文件路径 (filesystems.php 调整 upload)
    //$file->move($filename);
     return ['info'=>$filename];
    
  
 }
 public function update(Request $request , Category $category){
     if($request->isMethod('get')){
        
         $id=$request->categorys;
         $categorys=Category::where('id',$id)->first();
         
          return  view('Admin/index/categoryupdate',compact('categorys')); 
         //var_dump($request->categorys);
     }
     elseif ($request->isMethod('post')) {
         //定义规则
         $rules=[
             'cat_name'=>'required|min:2|unique:category,cat_name,'.$request->categorys,
             'cat_desc'=>'required|min:4',
         ];
         $msg=[
             'cat_name.required'=>'分类不能为空',
              'cat_desc.required'=>'概述不能为空',
             'cat_name.min'=>'分类至少2字',
             'cat_name.unique'=>'名称存在',
             
         ];
          $id=$request->categorys;
         $categorys=Category::where('id',$id)->first();
         $data=$request->all();
         //验证规则
         $validator=Validator::make($data,$rules,$msg);
         if($validator->passes()){
             
             //验证通过
             $old_category_thumb=$categorys->category_thumb;
             $new_category_thumb=$request->input('cat_thumb');
             if($old_category_thumb!=$new_category_thumb){
                 //说明修改了图
                 if($old_category_thumb!=""){
                     //删旧图
                     $old_category_thumb= str_replace('/uploads/','',$old_category_thumb);
                     Storage::disk('upload')->delete($old_category_thumb);
                     
                 }
             }
             unset($data["_token"]);
             Category::where('id',$id)->update($data);
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
     $del=Category::where('id',$id)->delete();
     if($del){
         return ['info'=>1];
     }else{
         return ['info'=>0];
     }
 }
    
    
    
}
