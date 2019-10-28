<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
        //后台首页
          public function index(){
              //视图的位置 /resouces/views/admin/index/index.blade.php
              return view('admin.index.index');
          }
          //后台welcome页面
          public function welcome(){
              //视图的位置 /resouces/views/admin/index/welcome.blade.php
              return view('admin.index.welcome');
          }
}
