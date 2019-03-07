<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynastiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynasties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fid')->nullable()->default(null)->comment('父id');
            $table->string('name',255);
            $table->text('introduction')->nullable()->default(null)->comment('简介');
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
        Schema::dropIfExists('dynasties');
    }
}
