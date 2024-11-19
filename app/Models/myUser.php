<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myUser extends Model
{
    use HasFactory;

    protected $table = 'usuario'; 

    protected $fillable = [
        'nome',
        'nome_usuario',
        'email',
        'senha',
        'nivel',
        'idempresa',
    ];  
}
