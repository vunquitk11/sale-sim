<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\Brand;

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

    public function pageBrands(){
        $results = Brand::all();
        foreach($results as $result){
            $result['count'] = 0;
        }
        return view('admin.brand.show')->with([
            'url' => 'brands',
            'results' => $results,
        ]);
    }

    public function pageCreateBrand(){
        return view('admin.brand.create')->with([
            'url' => 'create-brand',
        ]);
    }

    public function pageUpdateBrand($id){
        $brand = Brand::find($id);
        if(!$brand) return redirect('/admin/brands')->with(['danger' => 'Something was wrong']);
        return view('admin.brand.update')->with([
            'url' => 'brands',
            'result' => $brand,
        ]);
    }
}
