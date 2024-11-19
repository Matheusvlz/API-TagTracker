<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $table = 'saida'; 

    protected $fillable = [
        'nome_produto',
        'status',
        'uid',
        'idempresa',
    ];  
}
