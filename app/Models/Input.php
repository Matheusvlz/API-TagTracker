<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $table = 'entrada';  

    protected $fillable = [
        'nome_produto',
        'status',
        'uid',
        'idempresa',
    ]; 
}
