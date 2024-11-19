<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'produto';  

    protected $fillable = [
        'produto_nome',
        'fornecedor',
        'quantidade',
        'idempresa',
    ]; 
}
