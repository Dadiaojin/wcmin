<?php

use Illuminate\Database\Seeder;

class Admin_1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('admin_1')->insert([
        	[
        		'username'=>'ddj',
        		'password'=>bcrypt('123456')
        	],
        

        ]);
    }
}
