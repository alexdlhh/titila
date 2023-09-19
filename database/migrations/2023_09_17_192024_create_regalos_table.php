<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegalosTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        link DATE NOT NULL,
        mensaje TEXT,
        portada VARCHAR(255),
        estado INT NOT NULL,
        id_novio INT NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_novio) REFERENCES $wpdb->prefix . 'novios' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('regalos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->date('link');
            $table->text('mensaje');
            $table->string('portada');
            $table->integer('estado');
            $table->bigInteger('id_novio')->unsigned();
            $table->date('creation_date');
            $table->date('update_date');
            $table->foreign('id_novio')->references('id')->on('novios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regalos');
    }
}
