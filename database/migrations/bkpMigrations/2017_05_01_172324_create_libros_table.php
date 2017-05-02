<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->dateTime('fecha_lanzmiento');
            $table->integer('autor_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('editorial_id')->unsigned();
            $table->string('idioma');
            $table->string('paginas');
            $table->string('descripcion');
            $table->string('portada');
            $table->string('estado',10);
            //////////RELACIONES///////////
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('editorial_id')->references('id')->on('editoriales');

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
        Schema::dropIfExists('libros');
    }
}
