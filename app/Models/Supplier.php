<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'fornecedor'; 

    protected $fillable = [
        'nome_fornecedor',
        'endereco',
        'email',
        'cnpj',
        'idempresa',
    ];  
}
