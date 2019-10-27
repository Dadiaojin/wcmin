<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*group的prefix是指public/后面的名称；namespace是指控制器名称*/
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('index','IndexController@index');   
     Route::get('welcome','IndexController@welcome');
     Route::get('category','CategoryController@index');
     
     Route::get('categorylist','CategoryController@indexlist');
      Route::get('categoryadd','CategoryController@add');
      Route::post('categoryadd','CategoryController@add');  
      Route::post('category/uploadimg','CategoryController@uploadimg');
       Route::match(['get','post'],'category/update/{categorys}','CategoryController@update');
         Route::post('category/del','CategoryController@del');
         
         //商品列表页
          Route::match(['get','post'],'goods/index','GoodsController@index');
      Route::get('goods/add','GoodsController@add');
      Route::post('goods/add','GoodsControllerr@add');  
      Route::post('goods/uploadimg','GoodsController@uploadimg');
       Route::match(['get','post'],'goods/update/{categorys}','GoodsController@update');
         Route::post('goods/del','GoodsControllerr@del');
         
         
});
