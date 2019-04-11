<?php
namespace App\Http\Controllers\Admin;
use App\Model\Admin;
use App\My\Helpers;
use App\My\MyAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash ;
use App\Http\Controllers\Controller ;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['logout']
        ]);
        $this->middleware('guest',[
            'only'=>['login','store']
        ]);
    }
    public function login()
    {
        //
        return view('admin.login');
    }
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'uname'=>'required',
            'password'=>'required|min:5',
        ]) ;
        $user = Admin::where('uname',  $data['uname'] )->first();

        if(MyAuth::check (  $data['password'],$user->password))
        {
            Auth::login($user) ;
            session()->flash(
                'success','登陆成功'
            ) ;
            return redirect('/home' ) ;
        }
        else
        {
            session()->flash(
                'success','登陆失败'
            ) ;
            return back() ;
        }
    }
    public function logout()
    {
        Auth::logout() ;
        session()->flash(
            'success','已经退出了'
        ) ;
        return redirect('/login') ;
    }
}