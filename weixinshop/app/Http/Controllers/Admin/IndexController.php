<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
        //后台首页
          public function index(){
              //视图的位置 /resouces/views/admin/index/index.blade.php
              $session=session()->get("userinfo");
      
      if(empty($session['id']) && empty($session['name'])){
          return redirect()->action('Admin\IndexController@login');
      }  else {
           return view('admin.index.index');
      }
              
             
          }
          //后台welcome页面
          public function welcome(){
              //视图的位置 /resouces/views/admin/index/welcome.blade.php
              return view('admin.index.welcome');
          }
          
          public function login(Request $request){
              if($request->isMethod('get')){
                   return view('admin/index/login');
              }
              else if($request->isMethod('post')){
                  
                   if(!empty($request)){
             $this->validate($request, [
           'username'=>'required|min:1',
            'password'=>'required|min:3',
                 'captcha'=>'required|captcha',
            
            
        ]);
        }
                  
                  //var_dump($request->all());
                  $checkname= Admin::where('username','=',$request->input('username'))->first();
                 // var_dump($checkname);
                  if(!empty($checkname)){
                     
                      if(Hash::check($request->input('password'),$checkname['password'])){
                         $name=$checkname['username'];
                          $id=$checkname['id'];
                           session(['userinfo'=>['name'=>$name,'id'=>$id]]);
                           //var_dump(session()->all());
                           return redirect()->action('Admin\IndexController@index');
                      }  else {
                           
                         echo '密码错误';
                      }
                      
                  }else{
                      echo '账户错误';
                  }
              }
          }
}
