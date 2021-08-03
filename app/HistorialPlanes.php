<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialPlanes extends Model
{
    protected $table ='historial_planes';
    protected $fillable = [
        'id_user', 'id_planes', 'accion'

    ];
}
