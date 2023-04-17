<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;
    protected $table = "documentos";

    public static function allDocuments(){
        try {
            return Documentos::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
