<?php
namespace App\Http\Controllers;
use App\Car;
use App\My\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
//use Illuminate\Support\Facades\Redis;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Redis ;
use App\Biz\PCACodeBiz ;
use App\My\Category ;
use App\My\Menu ;
class TestController extends Controller
{
    public function t1(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email'
//        ]);
//
//        $input = $request->all();

        $date1 = "2014-11-11";
        $var = strtotime($date1) ;
       Helpers::p($var)   ;
        Helpers::p(
          (date('Ymd',$var))
    )   ;
print_r("==================================" ) ;
        $sn =  strrev( (Helpers::gen_random_datenum_cd(16)))  ;
     var_dump($sn)  ;
        $rev_sn = strrev($sn) ;
      $int_str =  substr($sn,6) ;
      var_dump(date('Y-m-d',intval($int_str))) ;


        $vector = new \Ds\Vector();

        $vector->push('a');
        $vector->push('b', 'c');

        $vector[] = 'd';

        print_r($vector);

     var_dump( sha1("G@DhbhhGKR9131641542609436"))   ;


//        return response()->json($car);
    }

    public function t2()
    {
//        Redis::command('LPUSH', ['runoobkey', "sss"]);
        Redis::command('DECR',['aa']) ;
//
//        $data = [
//            "a" =>1 ,
//            "b" =>3 ,
//        ] ;
//        return response()->json(Helpers::build_rest_res(1,$data));

       $history =  "上地,咖啡,猪肉,走吧" ;



      $rec =  DB::connection('mysql_user')->table("customer_locate_city")->where('customer_id', 1)->first() ;
      var_dump($rec->chosen_city) ;

     $no =  Helpers::gen_random_datenum_cd(16) ;

     var_dump($no) ;

//print_r(base64_encode('9131641542609436')) ;

        echo "今天:",date("Y-m-d H:i:s",time()),"<hr>";

        $d_str = date("Y-m-d H:i:s",time()) ;

        $rec =  DB::connection('mysql_user')->table('customer_order')->where([
            'order_no'=>'9131641542609436',
            'id'=>1
        ])->update(
            [
'checking_no' => Helpers::gen_random_datenum_cd(16) ,
'checking_time' =>$d_str
            ]
        );

        var_dump($rec) ;

    }
    public function t3(Request $request){

//     $content =   $request->getContent() ;
//     var_dump(32) ;

//        $val =   Redis::get("aa") ;
//        var_dump($val) ;

//        echo url('user/profile', [1]);



//        var_dump( );
//      $rtn =  Redis::HMSET('hmset',(json_decode($json,true))) ;
//
//      var_dump($rtn) ;
//        PCACodeBiz::provinces_set() ;
//        PCACodeBiz::cities_set() ;
//        PCACodeBiz::areas_set() ;
//        $rtn =   PCACodeBiz::areas_get("110105") ;
//
//        var_dump($rtn) ;

        Menu::gen_menu() ;




    }

    public function t4(Request $request){
       return view('admin.t4') ;
    }

    public function t5(Request $request){
        return view('admin.t5') ;
    }


}