<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fid')->nullable()->default(null)->comment('朝代id');
            $table->string('name',255);
            $table->string('capital',125)->nullable()->default(null)->comment('首都');
            $table->text('introduction')->nullable()->default(null);
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
        Schema::dropIfExists('countries');
    }
}
