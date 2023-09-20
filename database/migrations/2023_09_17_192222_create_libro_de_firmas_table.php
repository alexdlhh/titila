<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroDeFirmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_de_firmas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('mensaje');
            $table->bigInteger('id_novio')->unsigned();
            $table->bigInteger('id_invitado')->unsigned();
            $table->string('slug');
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
        Schema::dropIfExists('libro_de_firmas');
    }
}
