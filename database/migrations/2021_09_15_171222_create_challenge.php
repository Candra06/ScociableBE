<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallenge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('level_diagnosa', ['Bukan SAD', 'SAD Ringan', 'SAD Sedang', 'SAD Berat', 'SAD Sangat Berat'])->nullable('Bukan SAD');
            $table->integer('day');
            $table->text('content');
            $table->text('description');
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
        Schema::dropIfExists('challenge');
    }
}
