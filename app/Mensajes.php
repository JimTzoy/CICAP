<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $table ='mensajes';
    protected $fillable = [
        'nombre', 'numero','correo', 'mensaje'

    ];
}
