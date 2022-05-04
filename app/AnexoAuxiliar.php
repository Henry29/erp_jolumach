<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnexoAuxiliar extends Model
{
    protected $table = 'tbconta_anexos_auxiliares';
     protected $fillable = ['descripcion','abreviatura'];
}
