<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $table = 'empresa'; 

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];  
}
