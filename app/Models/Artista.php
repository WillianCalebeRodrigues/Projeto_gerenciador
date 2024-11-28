<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;
    protected $fillable = [
    'nome_artista',
    'nacionalidade',
    'genero_artista',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_artista');
    }
}
