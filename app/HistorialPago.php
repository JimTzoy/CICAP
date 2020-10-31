<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialPago extends Model
{
    protected $table ='historial_pagos';
    protected $fillable = [
        'id_user', 'id_pago'

    ];
}
