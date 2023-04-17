<?php

namespace App\Http\Controllers;

use App\Models\UserCredentials;
use App\Models\UsersContact;
use App\Models\Publicaciones;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{   
    public function myProfile(){
        try {
            return Inertia::render('Users/Profile',[
                'user' => Auth::user(),
                'owner' => true
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function userProfile($user_id){
        try {
            $user = User::getUser($user_id);

            if($logged_user = Auth::user()){
                $owner = $logged_user->id == $user_id? true : false; 
            }else{
                $owner = false;
            }
            return Inertia::render('Users/Profile',[
                'user' => $user,
                'owner' => $owner
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getCredentials($id){
        return UserCredentials::getCredentials($id);
    }

    public function updateCredentials(Request $request){
        $semblanza = $request->input('semblanza');
        $titulo = $request->input('titulo');
        $user_id = $request->input('uid');

        $res = UserCredentials::updateCredentials($user_id, $titulo, $semblanza);
        return $res;
    }

    public function getContactInfo($id){
        return UsersContact::getUserContactInfo($id);
    }

    public function updateContactData(Request $request){
        try {
            $res = UsersContact::updateUserContact(
                $request->input('uid'),
                $request->input('telefono'),
                $request->input('correo'),
                $request->input('link1'), 
                $request->input('link2')
            );

            return $res;
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addNewPublication(Request $request){
        try {
            $res = Publicaciones::addNewPub(
                $request->input('userid'),
                $request->input('titulo'),
                $request->input('autor'),
                $request->input('autores'), 
                $request->input('doi'),
                $request->input('link'), 
                $request->input('evento'),
                $request->input('mes'),
                $request->input('anio')
            );
            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllPublications($uid){
        try {
            return Publicaciones::getAllForUser($uid);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatePublication(Request $request){
        try {
            $res = Publicaciones::updatePubById(
                $request->input('autor'),
                $request->input('autores'),
                $request->input('titulo'),
                $request->input('evento'),
                $request->input('link'),
                $request->input('anio'), 
                $request->input('mes'),
                $request->input('user_id'),
                $request->input('doi'),
                $request->input('pub_id')
            );

            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroyPublication($pub_id){
        try {
            $res = Publicaciones::destroyPub(Auth::user()->id, $pub_id);
            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
