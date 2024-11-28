<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albun extends Model
{
    use HasFactory;
    
   
    protected $fillable = [
        'nome_album',
        'album_artista',  
        'ano_lancamento',
        'album_genero',   
        'album_idioma',   
    ];

   
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'album_artista');
    }

    
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'album_genero');
    }

   
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'album_idioma');
    }
}
