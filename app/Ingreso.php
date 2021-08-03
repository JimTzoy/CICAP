<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table ='ingresos';
    protected $fillable = [
   	'cantidad','descripcion','tipo','img','fecha','id_user','idbanco','created_at'
   ];
}

