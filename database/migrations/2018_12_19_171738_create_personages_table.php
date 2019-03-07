<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('height')->nullable()->default(null)->comment('身高');
            $table->integer('weight')->nullable()->default(null)->comment('体重(千克)');
            $table->string('type',255)->nullable()->default(null)->comment('职位，成就');
            $table->text('introduction')->nullable()->default(null);
            $table->integer('cid')->nullable()->default(null)->comment('国家id');
            $table->integer('rid')->nullable()->default(null)->comment('宗教id');
            $table->string('stime',32)->nullable()->default(null);
            $table->string('etime',32)->nullable()->default(null);
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
        Schema::dropIfExists('personages');
    }
}
