<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->notNull()->unique()->comment('名称');
            $table->string('mobile',20)->notNull()->default('')->comment('电话号码');
            $table->string('province',32)->notNull()->default('')->comment('省份');
            $table->string('city',32)->notNull()->default('')->comment('城市');
            $table->string('country',32)->notNull()->default('')->comment('区县');
            $table->string('detail',64)->notNull()->default('')->comment('详细地址');
            $table->integer('user_id')->notNull()->comment('用户信息');
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
        Schema::dropIfExists('address');
    }
}
