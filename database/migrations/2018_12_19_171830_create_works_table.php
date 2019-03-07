<?php

use Ouyang\Concurrency\Schema;
use Ouyang\Concurrency\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->nullable()->default(null)->comment('作者id');
            $table->string('name',255)->nullable()->default(null);
            $table->integer('type')->nullable()->default(null)->comment('作者类型');
            $table->text('introduction')->nullable()->default(null);
            $table->text('content');
            $table->string('stime',32)->nullable()->default(null);
            $table->string('etime',32)->nullable()->default(null);
            $table->fulltext(['name', 'content']);
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
        Schema::dropIfExists('works');
    }
}
