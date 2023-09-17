<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        novio VARCHAR(255) NOT NULL,
        novia VARCHAR(255) NOT NULL,
        fecha_boda DATE NOT NULL,
        habilitar INT NOT NULL,
        publicar INT NOT NULL,
        estado INT NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        programa TEXT,
        PRIMARY KEY (id)
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
