<?php
namespace App\Http\Controllers\Admin;
use App\My\MyAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\YQUser ;
use Illuminate\Support\Facades\Hash ;
use App\My\Helpers ;
class IndexController extends Controller
{
    public function home(){

       return view('admin.home') ;
    }
}
