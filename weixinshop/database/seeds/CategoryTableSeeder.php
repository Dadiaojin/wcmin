<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //填充category表数据,写正常入库的代码；（可以使用DB类，也可以使用模型）
        DB::table('category')->insert([
        	[
        		'cat_name'=>'帽子',
        		'cat_desc'=>'帽子非常好'
        	],
        	[
        		'cat_name'=>'手套',
        		'cat_desc'=>'手套非常好'
        	]

        ]);

    }
}
