<?php

namespace App\Http\Controllers\Admin;
use App\My\Helpers ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL ;
class PriviledgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['list']
        ]);

    }

    public function list(){


//        $url = URL::current() ;
//     $res =   Helpers::str_retrive_left($url , '/') ;
//print_r($res) ; die() ;


//        var_dump($url) ;
//        $pos = strrpos ($url,'/') ;
//        var_dump($pos) ;
//      print_r(  substr($url , $pos) );
//
//        die() ;

        return view('admin.priviledge.list') ;
    }
}
