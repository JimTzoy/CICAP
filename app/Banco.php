<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table ='banco';
    protected $fillable = [
   	'nbanco','cantidad','updated_at'
   ];
}