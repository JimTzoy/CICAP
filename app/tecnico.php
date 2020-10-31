<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tecnico extends Model
{
	protected $table ='tecnicos';
    protected $fillable = [
   	'nombre','appaterno','apmaterno','curp','edad','domicilio','codigopostal','ciudad','created_at'
   ];
	
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
