<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;

class Admin extends Model
{
    use HasFactory;

    public static function getCarrImgs(){
        try {
            return DB::table('carrusel_imagenes')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function storeImage($image, $extension, $name, $caption, $id){
        try {

            if(!is_null($image) ){
                $path = $image->storeAs(
                    'public/carousel_imgs',
                    time().$name);

                $img = DB::table('carrusel_imagenes')
                ->where('id', $id)
                ->update([
                    'imagen_path' => time().$name,
                    'texto_imagen' => $caption ]);
            }else{
                $img = DB::table('carrusel_imagenes')
                ->where('id', $id)
                ->update(['texto_imagen' => $caption]);
            }

            return $id;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function storeFile($filename){
        try {
            $save = DB::table('documentos')->insert([
                'nombre_archivo' => $filename,
                'path_archivo' => $filename
            ]);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
