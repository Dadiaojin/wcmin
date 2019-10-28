<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name',32)->notNull()->unique()->comment('名称');
            $table->integer('cat_id')->notNull()->comment('所属栏目的id');
            $table->decimal('goods_price',9,2)->notNull()->default(0)->comment('价格');
            $table->integer('stock')->notNull()->default(100)->comment('库存');
            $table->string('goods_thumb',100)->notNull()->default('')->comment('缩略图');
            $table->string('goods_desc')->notNull()->default('')->comment('描述');
            $table->integer('is_hot')->notNull()->default(0)->comment('是否热卖');
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
        Schema::dropIfExists('goods');
    }
}
