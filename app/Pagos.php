<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table ='pagos';
    protected $fillable = [
        'fechapago', 'cantidad','observacion', 'id_contrato','id_user','idbanco', 'fechainicio', 'fechafin'

    ];
}
