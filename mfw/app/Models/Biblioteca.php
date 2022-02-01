<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;
    protected $table = "listas";
    protected $fillable = [
       
        'usuario_id',
       
    ];
    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}
