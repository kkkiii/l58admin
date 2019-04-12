<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 2019/4/11
 * Time: 18:55
 */

namespace App\My;


class MyStr
{
    /**
     * @param $instr to process string
     * @param $delimiter find the last occurrence ,trancate the str tail part left
     *
     */
    public static function str_retrive_left($instr ,$delimiter):string
    {
        $pos = strrpos ($instr,$delimiter) ;
        return (  substr($instr , $pos) );
    }
}