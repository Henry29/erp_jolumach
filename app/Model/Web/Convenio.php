<?php

namespace App\Model\Web;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
     protected $table = 'tbconvenios';
     protected $fillable = ['descripcion','direccion', 'telefono', 'estado'];


     public function AnexoAuxiliar()
     {
         return $this->hasMany('App\AnexoAuxiliar');
     }
}
