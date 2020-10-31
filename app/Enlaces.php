<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlaces extends Model
{
    protected $table ='enlaces';
    protected $fillable = [
    'ip','nombre','frecuencia','canal','pass','ubicacion','tipo','modelo','intensidad','tx','rx','eirp','distancia','conectadoa'];
}
