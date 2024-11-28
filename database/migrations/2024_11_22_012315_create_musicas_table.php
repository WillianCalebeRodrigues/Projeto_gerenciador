<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('musica_nome', 100);
            $table->unsignedBigInteger('musica_artista');
            $table->foreign('musica_artista')->references('id')->on('artistas');  
            $table->unsignedBigInteger('musica_album');
            $table->foreign('musica_album')->references('id')->on('albuns');
            $table->unsignedBigInteger('musica_genero');
            $table->foreign('musica_genero')->references('id')->on('generos');
            $table->year('data_lancamento');
            $table->unsignedBigInteger('musica_idioma');
            $table->foreign('musica_idioma')->references('id')->on('idiomas');
            $table->string('musica_link', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};
