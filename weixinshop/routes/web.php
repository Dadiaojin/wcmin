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
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
                //后台首页
		Route::get('index','IndexController@index');
		//加载welcome页面的
		Route::get('welcome','IndexController@welcome');
                
                //分类页面
                Route::get('category/index','CategoryController@index');
                //分类添加
                 Route::match(['get','post'],'category/add','CategoryController@add');
                 //处理文件上传
                 Route::post('category/uploadimg','CategoryController@uploadimg');
                  //分类修改
                 Route::match(['get','post'],'category/update/{categorys}','CategoryController@update');
                 //分类删除
                 Route::post('category/del','CategoryController@del');
                 
                 
                 //商品列表页面
                 Route::match(['get','post'],'goods/index','GoodsController@index');
                //商品添加
                 Route::match(['get','post'],'goods/add','GoodsController@add');
                 //处理文件上传
                 Route::post('goods/uploadimg','GoodsController@uploadimg');
                  //商品修改
                 Route::match(['get','post'],'goods/update/{goods}','GoodsController@update');
                 //商品删除
                 Route::post('goods/del','GoodsController@del');
                 
});