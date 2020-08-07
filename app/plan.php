<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
	protected $table =['plan']
    protected $fillable = [
        'nombre', 'descripcion', 'precio',
    ];
}
