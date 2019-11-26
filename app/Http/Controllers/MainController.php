<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
class MainController extends Controller
{
    function index(){
        return view('login');
    }

    function checklogin(Request $request){
        $this->validate($request,[
            'email'     => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ],
        [
            'email.required' => 'Email còn trống',
            'password.required' => 'Email còn trống',
        ]);
        $user_date = array(
            'email'     =>  $request->get('email'),
            'password'  =>  $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('admin/project');
        }else{
            session()->flash('error_login','Thông tin đăng nhập sai');
            return redirect('login');
        }
    }
}
