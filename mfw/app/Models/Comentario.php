<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
    'capitulo_id',
    'user_id',  
    'user_name', 
    'coment',
];
public function user()
{
    return $this->belongsTo('App\Models\User');
}

public function capitulo()
{
    return $this->belongsTo('App\Models\Capitulo');
}
}
