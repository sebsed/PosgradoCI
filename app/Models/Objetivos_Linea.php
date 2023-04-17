<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivos_Linea extends Model
{
    protected $table = 'objetivos_puntuales_lineas_investigacion';
    use HasFactory;

    public function linea(){
        return $this->belongsTo('App\Models\LineasInv','linea_id');
    }

    public static function getObjetivosLinea($linea_id){
        return Objetivos_linea::where('linea_id',$linea_id)->get();
    }
}
