<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
         return  view('Admin/index/category');
    }
    public function indexlist(){
        
        $data=Category::all();
        
        
        
        
        return  view('Admin/index/categorylist',compact('data'));
    }
}
