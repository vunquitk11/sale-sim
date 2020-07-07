<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\User;

//helper
use App\Helpers\AdminHelper;

class AdminController extends Controller
{
    //
    public function postLogin(Request $request){
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );
        Auth::attempt($userdata);
        if (!Auth::user()) {
            return redirect('/admin/login')->with('danger', 'Sai thông tin đăng nhập');
        }else{
            $user = Auth::user();
            if($user->type == 2){
                return redirect('/admin');
            }else{
                Auth::logout();
                return redirect('/admin/login')->with('danger', 'Sai thông tin đăng nhập');
            }
        }
    }
}
