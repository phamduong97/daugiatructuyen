<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Hash;
use Session;
use Auth;


class UserController extends Controller
{
    public function Login(){
    	return view('admin.users.login');
    }

    public function getLogin(Request $request){
    	$this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ],
        [
            'username.required'=>'Hãy nhập địa chỉ email',
            'password.required'=>'Mật khẩu vào mật khẩu'
           
        ]);

        $check = array('email'=>$request->username,'password'=>$request->password);

        if(Auth::attempt($check)){

            Session::put('userid',Auth::user()->id);
            Session::put('username',Auth::user()->fullname);
            Session::put('usercode',Auth::user()->id_user);
            Session::put('userrole',Auth::user()->role);
            return redirect()->route('admin.home');

        }else{

           return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại. Sai tài khoản hoặc mật khẩu']);

        }   
    }

     public function Logout(){
    	Auth::logout();
    	Session::forget('userid');
    	Session::forget('username');
        Session::forget('usercode');
    	return redirect()->route('login');
    }
}
