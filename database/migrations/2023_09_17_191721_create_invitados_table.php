<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('invitados');
            $table->integer('confirmacion');
            $table->string('menus');
            $table->text('alergenos');
            $table->string('email');
            $table->string('telefono');
            $table->bigInteger('id_novio')->unsigned();
            $table->foreign('id_novio')->references('id')->on('novios');
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
        Schema::dropIfExists('invitados');
    }
}
