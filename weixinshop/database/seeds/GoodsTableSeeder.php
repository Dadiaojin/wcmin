<?php

use Illuminate\Database\Seeder;
use App\Goods;
class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goods::create([
        	'goods_name'=>'压缩帽',
        	'goods_price'=>1234.56,
        	'cat_id'=>1
        ]);
        Goods::create([
        	'goods_name'=>'金丝手套',
        	'goods_price'=>9234.56,
        	'cat_id'=>2
        ]);
    }
}
