<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;
    protected $table = "publicaciones_usuarios";

    public static function addNewPub($uid, $titulo, $autor, $autores, $doi, $link, $evento, $mes, $anio){
        try {
            $pub = new Publicaciones();
            
            $pub->user_id = $pub->checkForNull($uid);
            $pub->titulo = $pub->checkForNull($titulo);
            $pub->autor = $pub->checkForNull($autor);
            $pub->autores = $pub->checkForNull($autores);
            $pub->doi = $pub->checkForNull($doi);
            $pub->link = $pub->checkForNull($link);
            $pub->revista_lugar = $pub->checkForNull($evento);
            $pub->anio_publicacion = $pub->checkForNull($anio);
            $pub->mes_publicacion = $pub->checkForNull($mes);
            $pub->save();
            
            return true;
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getAllForUser($uid){
        try {
            $prod = Publicaciones::where('user_id',$uid)->get();
            return $prod;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function updatePubById($author, $authors, $title, $evento, $link, $anio, $mes, $uid, $doi, $pid){
        try {
            $pub = Publicaciones::find($pid);

            if($pub->user_id == $uid){

                $pub->autor = $pub->checkForNull($author);
                $pub->autores = $pub->checkForNull($authors);
                $pub->titulo = $pub->checkForNull($title);
                $pub->revista_lugar = $pub->checkForNull($evento);
                $pub->link = $pub->checkForNull($link);
                $pub->anio_publicacion = $pub->checkForNull($anio);
                $pub->mes_publicacion = $pub->checkForNull($mes);
                $pub->doi = $pub->checkForNull($doi);
                $pub->save();

                return true;

            }else{
                return "Usuario no corresponde";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function destroyPub($uid, $pid){
        try {
            $status = false;
            $pub = Publicaciones::find($pid);

            if($uid == $pub->user_id){
                $pub->delete();
                $status = true;
            }
            return $status;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private static function checkForNull($element){
        if( !$element || $element == 'null' || $element == 'NULL' || $element== 'Null' || strlen($element) == 0 ){
            return null;
        }else{
            return $element;
        }
    }
}