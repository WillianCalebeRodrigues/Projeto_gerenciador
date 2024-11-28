<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'musica_nome',
        'musica_artista',
        'musica_album',
        'musica_genero',
        'musica_idioma',
        'musica_link',
    ];

    
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'musica_artista');
    }

    
    public function album()
    {
        return $this->belongsTo(Albun::class, 'musica_album'); 
    }

    
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'musica_genero');
    }

    
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'musica_idioma');
    }
}
