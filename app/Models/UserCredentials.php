<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    use HasFactory;
    protected $table = 'credenciales_usuario';

    protected $fillable = [
        'user_id',
    ];

    public static function getCredentials($id){
        if (is_null(UserCredentials::where( 'user_id' ,$id)->get())){
            $usr_cred = new UserCredentials();
            $user_cred->user_id = $id;
            $user_cred->save();
            // return $user_cred;
            return "Oasdf";
        }else{
            return UserCredentials::where( 'user_id' ,$id)->get();
        }
    }

    public static function updateCredentials($uid, $titulo, $semblanza){

        UserCredentials::where('user_id', $uid)
                        ->update([
                            'titulo' => $titulo,
                            'semblanza' => $semblanza
                        ]);
            
        if (is_null($user_cred = UserCredentials::where('user_id', $uid)->get())){
            $user_cred = new UserCredentials();
            $user_cred->user_id = $uid;
            $user_cred->titulo = $titulo;
            $user_cred->semblanza = $semblanza;
            $user_cred->save();
        }

        return $user_cred;
    }
}
