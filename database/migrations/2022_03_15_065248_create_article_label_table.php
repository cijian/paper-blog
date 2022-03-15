<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleLabelTable extends Migration
{
    protected $table = 'article_label';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->integer('article_id')->nullable(false)->default(0)->comment('文章ID');
            $table->integer('label_id')->nullable(false)->default(0)->comment('标签ID');
            $table->softDeletes();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `".env('DB_PREFIX','')."{$this->table}` comment '文章-标签关联表'");
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
