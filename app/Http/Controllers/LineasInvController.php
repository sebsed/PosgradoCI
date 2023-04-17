<?php

namespace App\Http\Controllers;

use App\Models\LineasInv;
use App\Models\LineasAcademicos;
use App\Models\Objetivos_Linea;
use Illuminate\Http\Request;
use Inertia\Inertia;


class LineasInvController extends Controller
{
    public function getAll(){

        $lineas = LineasInv::getAllAreas();
        return Inertia::render('LineasInv/LineasInv',[
            'lineas' => $lineas
        ]);
    }

    public function getLineaInvestigacion($id){
        $linea = LineasInv::getLineaInvestigacion($id);
        return Inertia::render('LineasInv/LineaIndividual/LineaInvestigacion',[
            'linea' => $linea,
        ]);
    }

    public function getLineMembers($linea_id){
        try {
            return LineasAcademicos::getUsersForLine($linea_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getNucleo(){
        try {
            //return "QUE PEDAL";
            return LineasAcademicos::getNucleoAcademico();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
