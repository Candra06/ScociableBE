<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_room')->unsigned();
            $table->integer('sender')->unsigned();
            $table->integer('receiver')->unsigned();

            $table->foreign('id_room')->on('konsultasi_room')->references('id');
            $table->foreign('sender')->on('users')->references('id');
            $table->foreign('receiver')->on('users')->references('id');
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
        Schema::dropIfExists('konsultasi_detail');
    }
}
