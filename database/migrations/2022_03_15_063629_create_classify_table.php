<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassifyTable extends Migration
{
    protected $table = 'classify';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',100)->default('')->comment('名称');
            $table->tinyInteger('sort')->default(0)->comment('排序字段');
            $table->tinyInteger('display')->default(0)->comment('是否展示');
            $table->softDeletes();
            $table->timestamps();
        });


        \DB::statement("ALTER TABLE `".env('DB_PREFIX','')."{$this->table}` comment '文章分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
