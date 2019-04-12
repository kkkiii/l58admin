<?php

namespace App\Http\Controllers\Admin;
use App\Model\Menu;
use App\My\Helpers ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL ;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Redirect ;
class ConsumerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['list','lock']
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
        $consumers = DB::table('consumers')->paginate(15);
        return view('admin.consumer.list', ['consumers' => $consumers]);
    }
    public function lock($id){
        DB::table('consumers')
            ->where('id', $id)
            ->update(['is_lock' => 1]);
        return Redirect::to('admin/consumer.list');
    }


    public function del($id){

        DB::table('consumers')->where('id', $id)->delete();

        return Redirect::to('admin/consumer.list');
    }


}
