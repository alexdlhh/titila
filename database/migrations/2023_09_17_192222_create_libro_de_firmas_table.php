<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroDeFirmasTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        mensaje TEXT,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        id_novio INT NOT NULL,
        id_invitado INT NOT NULL,
        slug VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
     * @return void
     */
    public function up()
    {
        Schema::create('libro_de_firmas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->text('mensaje');
            $table->date('creation_date');
            $table->date('update_date');
            $table->integer('id_novio')->unsigned();
            $table->integer('id_invitado')->unsigned();
            $table->string('slug');
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
