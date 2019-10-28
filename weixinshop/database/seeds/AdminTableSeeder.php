<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //向管理员表里面填充数据
        DB::table('admin')->insert([
        	[
        		'username'=>'宋江',
        		'password'=>bcrypt('123456')
        	],
        	[
        		'username'=>'libai',
        		'password'=>bcrypt('123456')
        	]

        ]);
    }
}
