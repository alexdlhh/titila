<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        invitados TEXT NOT NULL,
        confirmacion INT,
        menus VARCHAR(255),
        alergenos TEXT,
        email VARCHAR(255),
        telefono VARCHAR(255),
        id_novio INT NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_novio) REFERENCES $wpdb->prefix . 'novios' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->text('invitados');
            $table->integer('confirmacion');
            $table->string('menus');
            $table->text('alergenos');
            $table->string('email');
            $table->string('telefono');
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
        Schema::dropIfExists('invitados');
    }
}
