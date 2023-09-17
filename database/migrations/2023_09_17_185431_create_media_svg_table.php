<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaSvgTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        codigo TEXT NOT NULL,
        tipo VARCHAR(255) NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        id_ciudad INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_ciudad) REFERENCES $wpdb->prefix . 'ciudad' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('media_svg', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->text('codigo');
            $table->string('tipo');
            $table->date('creation_date');
            $table->date('update_date');
            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudad');
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
