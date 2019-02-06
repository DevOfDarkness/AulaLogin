<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('pagina')->nullable();
            $table->integer('idDepartamento')->unsigned();
            $table->timestamps();
        });

        Schema::table('professors', function (Blueprint $table) {
          $table->foreign('idDepartamento')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}
