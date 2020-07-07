<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    //
    public function pageAdminDashboard(){
        return view('admin.index')->with([
            'url' => 'dashboard',
        ]);
    }
    public function pageLogin(){
        $user = Auth::user();
        if($user){
            if($user->type == 2) return redirect('/admin');
        }
        return view('admin.auth.login');
    }
}
