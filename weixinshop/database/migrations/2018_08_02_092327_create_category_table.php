<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //以下就是创建表结构的代码，通过Schema结构生成器来创建表结构
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');//创建主键，名称叫id
            $table->string('cat_name',32)->notNull()->unique()->comment('栏目名称');
            $table->string('cat_desc')->notNull()->default('')->comment('栏目描述');
            $table->string('cat_thumb')->notNull()->default('')->comment('栏目缩略图');
            $table->timestamps();//创建created_at和updated_at字段的；
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        //删除表的
        Schema::dropIfExists('category');
    }
}
