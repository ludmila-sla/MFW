<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo_user extends Model
{
    use HasFactory;
    protected $table = "capitulo_user";
    protected $primaryKey   = 'id';
    protected $fillable = [
        'soma',
      'capitulo_id',
      'user_id',
        
    ];
}
