<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('novio');
            $table->string('novia');
            $table->date('fecha_boda');
            $table->integer('habilitar');
            $table->integer('publicar');
            $table->integer('estado');
            $table->date('creation_date');
            $table->date('update_date');
            $table->text('programa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novios');
    }
}
