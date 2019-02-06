<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->integer('duracaoEmSegmentos');
            $table->string('pagina');
            $table->integer('anoFundacao');
            $table->float('totalCreditos');
            $table->integer('idDepartamento')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('cursos', function (Blueprint $table) {
          $table->foreign('idDepartamento')->references('id')->on('departamentos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
