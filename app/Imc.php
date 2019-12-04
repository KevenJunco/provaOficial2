<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $table = 'imc';

    public $timestamps = false;
    
    protected $fillable = [
        'id', 'nome', 'peso', 'altura', 'resultado', 'diagnostico' 
    ];
}
