<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{

    protected $table = 'article';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('classify_id')->nullable(false)->default(0)->comment('分类ID');
            $table->string('title',100)->nullable(false)->default('')->comment('标题');
            $table->string('describe',255)->nullable(false)->default('')->comment('描述');
            $table->text('content')->comment('内容');
            $table->dateTime('publish')->nullable(false)->default(null)->comment('出版时间');
            $table->tinyInteger('sort')->nullable(false)->default(0)->comment('排序字段');
            $table->tinyInteger('display')->nullable(false)->default(0)->comment('是否展示');
            $table->softDeletes();
            $table->timestamps();

        });

        \DB::statement("ALTER TABLE `".env('DB_PREFIX','')."{$this->table}` comment '文章表'");
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
