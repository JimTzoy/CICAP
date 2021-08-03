<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialContratos extends Model
{
    protected $table ='historial_contratos';
    protected $fillable = [
        'id_user', 'id_contratos', 'accion'

    ];
}
