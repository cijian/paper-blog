<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveMessageTable extends Migration
{

    protected $table = 'leave_message';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('article_id')->nullable(false)->default(0)->comment('文章ID');
            $table->integer('reply_id')->nullable(false)->default(0)->comment('回复ID');
            $table->integer('first_reply_id')->nullable(false)->default(0)->comment('主回复ID');
            $table->string('ip',20)->nullable(false)->default('')->comment('IP');
            $table->string('leave_name',20)->nullable(false)->default('')->comment('留言人随机名称');
            $table->text('comment')->default('')->comment('评论');
            $table->softDeletes();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `".env('DB_PREFIX','')."{$this->table}` comment '留言信息'");
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
