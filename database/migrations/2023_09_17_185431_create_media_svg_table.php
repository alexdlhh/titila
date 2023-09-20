<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaSvgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_svg', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('codigo');
            $table->string('tipo');
            $table->bigInteger('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudad');
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
        Schema::dropIfExists('media_svg');
    }
}
