<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getCarruselImages(){
        try {
            return Admin::getCarrImgs();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCarruselImages(Request $request){
        try {

            $caption = $request->input('caption');
            $id = $request->input('id');
            
            if($request->file('imagen')){
                $image = $request->file('imagen');
                $extension = $request->file('imagen')->getClientOriginalExtension();
                $name = $request->file('imagen')->getClientOriginalName();
            }else{
                $image = null;
                $extension = null;
                $name = null;
            }

            $res = Admin::storeImage( $image, $extension, $name, $caption, $id );

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function uploadFile(Request $request){
        try {
            // Read File from request
            $file = $request->file('file');
            $filename = $request->input('filename');
            $fileext = $request->file('file')->getClientOriginalExtension();

            // validate Filename
            $filename = $filename? $filename.'.'.$fileext : $file->getClientOriginalName();

            // File is here 
            if($file){
                if($fileext == 'pdf' || $fileext == 'doc' || $fileext == 'docx' || $fileext == 'xlsx' || $fileext == 'csv' || $fileext == 'ppt' || $fileext == 'txt'){
                    // Save path to database
                    $file->storeAs('public/files', $filename);
                    $res = Admin::storeFile($filename);
                }
            }
            return $filename;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
