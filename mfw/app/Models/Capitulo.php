<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    protected $table = 'capitulos';
    protected $primaryKey   = 'id';
    protected $fillable = [
        'nomecap',
        'cap',  
        'livro_id',
        'vot',
        'leit',
        'co',
    ];
  
    public function livros() {
        return $this->belongsTo('App\Models\Livro');
    }
    public function likes() {
        return $this->hasMany('App\Models\Like');
    }
    public function coments() {
        return $this->hasMany('App\Models\Like');
    }
}
