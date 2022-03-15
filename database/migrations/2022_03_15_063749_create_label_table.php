<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelTable extends Migration
{

    protected $table = 'label';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('label_name',100)->nullable(false)->default('')->comment('标签名称');
            $table->tinyInteger('sort')->nullable(false)->default(0)->comment('排序字段');
            $table->tinyInteger('display')->nullable(false)->default(0)->comment('是否展示');
            $table->softDeletes();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `".env('DB_PREFIX','')."{$this->table}` comment '文章标签表'");
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
