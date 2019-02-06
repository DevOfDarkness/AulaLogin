<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->integer('matricula')->unique();
            $table->string('dataNascimento');
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->float('cr');
            $table->integer('idCurso')->unsigned();
            $table->timestamps();
        });

        Schema::table('alunos', function (Blueprint $table) {
          $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
