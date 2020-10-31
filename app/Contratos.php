<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
	protected $table ='contratos';
    protected $fillable = [
   	'numerocliente','nombrecompleto',	'domicilio'	,'telefono',	'ipcliente'	,'ipantena',	'fechainicio',	'fechafin','instalacion','plan_id',	'antena_id'	,'tecnico_id', 'status', 'observacion'	,'created_at'
   ];
}
