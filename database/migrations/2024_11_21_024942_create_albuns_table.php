<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albuns', function (Blueprint $table) {
            $table->id();
            $table->string('nome_album');
            $table->unsignedBigInteger('album_artista');
            $table->foreign('album_artista')->references('id')->on('artistas');
            $table->time('duracao');
            $table->year('ano_lancamento');
            $table->unsignedBigInteger('album_genero');
            $table->foreign('album_genero')->references('id')->on('generos');
            $table->unsignedBigInteger('album_idioma');
            $table->foreign('album_idioma')->references('id')->on('idiomas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albuns');
    }
};
