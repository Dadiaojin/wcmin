<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //php artisan make:controller Admin/IndexController
    public function index(){
        return  view('Admin/index/index');
    }
     public function welcome(){
        return  view('Admin/index/welcome');
    }
    
    
    
}