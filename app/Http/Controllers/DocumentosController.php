<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;

class DocumentosController extends Controller
{
    public function getAllDocuments(){
        try {
            // Obtener documentos de modelo 
            $documentos = Documentos::allDocuments();
            return $documentos;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
