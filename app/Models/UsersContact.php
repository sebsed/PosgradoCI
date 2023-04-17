<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersContact extends Model
{
    use HasFactory;
    protected $table = 'contacto_usuarios';

    protected $fillable = [
        'user_id',
        'email'
    ];

    public static function getUserContactInfo($id){
        return UsersContact::where('user_id',$id)->get();
    }

    public static function updateUserContact($uid, $tel, $email, $l1, $l2){

        $usr = Userscontact::where('user_id',$uid)
        ->update([
            'telefono' => UsersContact::checkForNull($tel),
            'email' => UsersContact::checkForNull($email),
            'link1' => UsersContact::checkForNull($l1)
        ]);

        return $usr;
    }

    private static function checkForNull($element, $current = null){

        if( !$element || $element == 'null' || $element == 'NULL' || $element== 'Null' || strlen($element) == 0 ){

            if($current){
                return $current;
            }else{
                return null;
            }
        }else{
            return $element;
        }
    }
}
