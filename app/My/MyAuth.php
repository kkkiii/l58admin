<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 2019/4/1
 * Time: 17:18
 */

namespace App\My;
use App\My\Helpers ;

class MyAuth
{
    public static function check($plain ,$pwd_hash)
    {
        $authcode = env('APP_AUTHCODE') ;

        return  "###" . md5(md5( $authcode . $plain))  == $pwd_hash;

    }

}