<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo', 250);
            $table->string('nome_exibicao', 150);
            $table->string('foto');
            $table->unsignedInteger('party_id');
            $table->foreign('party_id')->references('id')->on('parties');
            $table->integer('numero_candidato');
            $table->string('endereco', 150);
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
        Schema::dropIfExists('candidates');
    }
}
