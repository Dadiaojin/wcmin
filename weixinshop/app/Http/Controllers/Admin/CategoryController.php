<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Storage;

class CategoryController extends Controller
{
    //完成分类列表
    public function index() {
        $data = Category::all();
        return view('admin/category/catelist',compact('data')); 
    }
    //完成分类添加
    public function add(Request $request) {
        //表单展示
        if($request->isMethod('get')){
        return view('admin/category/cateadd');
        }
        //数据入库
        else if($request->isMethod('post')){
          /*  $this->validate($request, [
                'cat_name'=>'required|min:3|unique:category,cat_name',
                'cat_desc'=>'required|min:5',
            ]);
            $data = $request->all();
            var_dump($data);
            Category::create($data);
            echo '插入成功!';*/
        //  return ['info'=>0,'error'=>'fail'];  
           //定义规则
            $rules = [
                 'cat_name'=>'required|min:3|unique:category,cat_name',
                 'cat_desc'=>'required|min:5',
            ];
            //错误提示
            $msg = [
               'cat_name.required'=>'分类名称不能为空',
               'cat_name.min'=>'分类名称至少3个字符',
               'cat_name.unique'=>'分类名称已经存在',
               'cat_desc.required'=>'分类描述不能为空',
               'cat_desc.min'=>'分类描述至少5个字符'
            ];
            $data = $request->all();
            if($data['cat_thumb']=='') unset($data['cat_thumb']);
           
            //用Validator验证规则
            $validator = Validator::make($data,$rules,$msg);
            
            if($validator->passes()){
                //验证通过，入库
                 Category::create($data);
                 return ['info'=>1];
            }else{
                $v = $validator->messages();//获取错误提示
               // print_r($v);
               $error = collect($v)->implode('0',',');
               return ['info'=>0,'error'=>$error];
            }
        }
    }
    
    //处理文件上传
    public function uploadimg(Request $request) {
        $file = $request->file('file'); //上传表单的文件域是file
        $filename = '/uploads/'.$file->store('image','upload');//返回值上传的文件
        return ['info'=>$filename];
    }
    
    //修改分类
    public function update(Request $request, Category $categorys) {
       // Category $categorys 相当于$categorys = Category::find(id)
      //  var_dump($categorys);
        //表单展示
        if($request->isMethod('get')){
        return view('admin/category/cateupdate', compact('categorys'));
        } 
        //数据修改
        else if($request->isMethod('post')){
            //定义规则
            $rules = [
                 'cat_name'=>'required|min:3|unique:category,cat_name,'.$categorys->id,
                 'cat_desc'=>'required|min:5',
            ];
            //错误提示
            $msg = [
               'cat_name.required'=>'分类名称不能为空',
               'cat_name.min'=>'分类名称至少3个字符',
               'cat_name.unique'=>'分类名称已经存在',
               'cat_desc.required'=>'分类描述不能为空',
               'cat_desc.min'=>'分类描述至少5个字符'
            ];
            $data = $request->all();
           // if($data['cat_thumb']=='') unset($data['cat_thumb']);
           
            //用Validator验证规则
            $validator = Validator::make($data,$rules,$msg);
            
            if($validator->passes()){
                //验证通过，修改
               //  Category::create($data);
                //删除旧的图片，新的图片添加
                $old_category_thumb = $categorys->cat_thumb;
                $new_category_thumb = $request->input('cat_thumb');
                if($old_category_thumb!=$new_category_thumb){
                    //说明修改了缩略图
                    if($old_category_thumb!=''){
                        //删除旧的缩略图
                        $old_category_thumb = str_replace('/uploads/', '',$old_category_thumb);
                        Storage::disk('upload')->delete($old_category_thumb);
                    }
                   
                }
                 $categorys->update($data);
                 return ['info'=>1];
            }else{
                $v = $validator->messages();//获取错误提示
               // print_r($v);
               $error = collect($v)->implode('0',',');
               return ['info'=>0,'error'=>$error];
            }
        } 
        }
        
        //删除分类
        public function del(Request $request) {
            //接收传递的数据
            $id = $request->input('id');
            $info = Category::find($id);
            //获取图片路径
            $cat_thumb = $info->cat_thumb;
            $cat_thumb = str_replace('/uploads/', '', $cat_thumb);
            //删除记录
            $res = $info->delete();
            //删除图片
            if($res){
                Storage::disk('upload')->delete($cat_thumb);
                return ['info'=>1];
            }else{
                return ['info'=>0];
            }
        }
    
}
