<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\models\Goods;
use App\Http\models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
class GoodsController extends Controller
{
    //
    public function index(Request $request){
        if($request->isMethod('get')){
        $data= Goods::with('category')->get();
        // $data2= Goods::with('category')->get()->toArray();
     //  var_dump($data2);
        return view('Admin/goods/list', compact('data'));   
        }elseif ($request->isMethod('post')) {
            $data = Goods::with('category')->get();
            $count=Goods::count();
            return[
                'draw'=>$request->input('draw'),
                'recordsTotal'=>$count,
                'data'=>$data,
                
            ];
        }
    }
}
