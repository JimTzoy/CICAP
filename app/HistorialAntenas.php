<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialAntenas extends Model
{
    protected $table ='historial_antenas';
    protected $fillable = [
        'id_user', 'id_antenas'

    ];
}
