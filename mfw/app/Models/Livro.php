<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $table = "livros";
    protected $fillable = [
        'titulo',
        'descricao',
        'capa',
        'categoria',
        'maior',
        'dir',
        'voto',
        'comentario',
        'leitura',
        
    ];
    protected $casts = [
        'tags' => 'array'
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
    public function capitulos() {
        return $this->hasMany('App\Models\Capitulo');
    }
}
