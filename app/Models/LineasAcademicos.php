<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\LineasInv;

class LineasAcademicos extends Model
{
    use HasFactory;

    protected $table = "lineas_investigacion_academicos";

    public static function getUsersForLine($line_id = null){
        try {
            if (is_numeric($line_id)){

                $users = LineasAcademicos::select('lineas_investigacion.titulo','users.name', 'lineas_investigacion_academicos.user_id', 'credenciales_usuario.imagen_perfil_path', 'lineas_investigacion.titulo as linea_titulo' )
                    ->leftJoin('credenciales_usuario', 'credenciales_usuario.user_id', '=', 'lineas_investigacion_academicos.user_id')
                    ->join('users', 'users.id', '=', 'lineas_investigacion_academicos.user_id')
                    ->leftJoin('lineas_investigacion', 'lineas_investigacion.id', '=', 'lineas_investigacion_academicos.linea_id')
                    ->where('linea_id',$line_id)
                    ->get();

            }else{
                $users = LineasAcademicos::select('lineas_investigacion.titulo as linea_titulo','credenciales_usuario.titulo as user_titulo', 'credenciales_usuario.user_id as user_id', 'imagen_perfil_path' )
                    ->leftJoin('credenciales_usuario', 'credenciales_usuario.user_id', '=', 'lineas_investigacion_academicos.user_id')
                    ->join('lineas_investigacion', 'lineas_investigacion.id', '=', 'lineas_investigacion_academicos.linea_id')
                    ->get();

            }
            return $users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
