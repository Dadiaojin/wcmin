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
    
    
    public function add(Request $request){
        
        
        
        
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
        
    }
}
