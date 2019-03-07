<?php

use Ouyang\Concurrency\Schema;
use Ouyang\Concurrency\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->index();
            $table->integer('country_id')->nullable()->default(null)->comment('国家id');
            $table->integer('type')->nullable()->default(null)->comment('类型');
            $table->text('introduction')->nullable()->default(null);
            $table->string('stime',32)->nullable()->default(null);
            $table->string('etime',32)->nullable()->default(null);
            $table->fulltext(['title', 'introduction']);
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
        Schema::dropIfExists('incidents');
    }
}
