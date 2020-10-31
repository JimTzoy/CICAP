<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antena extends Model
{
		protected $table ='antenas';
    protected $fillable = [
    'ip','nombre','frecuencia','frecuencias','canal','user'	,'pass','ubicacion','tipo','modelo','intensidad','umbralruido','ccq','tx','rx','calidad','capacidad','conectadoa'
];
}
