<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->notNull()->comment('会员的id');
            $table->string("order_sn")->notNull()->comment('订单的编号');
            $table->decimal('order_price',9,2)->notNull()->comment('订单金额');
            $table->integer('order_status')->notNull()->default(1)->comment('订单状态1正常0取消');
            $table->string('trade_no')->notNull()->default('')->comment('订单交易号');
            $table->integer('is_pay')->notNull()->default(0)->comment('是否支付1已经支付');
            $table->integer('is_shop')->notNull()->default(0)->comment('是否发货0未发货');
            $table->integer('is_receipt')->notNull()->default(0)->comment('是否收货0未收货');
            $table->string('order_msg',32)->notNull()->default('')->comment('订单留言');
            $table->string('address',108)->notNull()->default('')->comment('收货地址');
            $table->timestamps();
        });
       //订单与商品详情表；
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->notNull()->comment('订单id');
            $table->string("goods_name")->notNull()->comment('商品名称');
            $table->string("goods_thumb")->notNull()->comment('商品缩略图');
            $table->decimal('goods_price',9,2)->notNull()->comment('商品金额');
            $table->integer('goods_counts')->notNull()->comment('购买数量'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
        Schema::drop('order_goods');
    }
}
