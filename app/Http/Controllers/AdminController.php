<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\User;
use App\Brand;
//helper
use App\Helpers\UploadFile;
use App\Helpers\AdminHelper;
use Storage;
use File;

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

    //brand
    public function postCreateBrand(Request $request){
        if(!$request->name || !$request->image) return redirect()->back()->with(['danger' => 'Something was wrong']);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = AdminHelper::createSlug($request->name);
        if($request->file('image')){
            $brand->image = UploadFile::uploadLocal($request->file('image'));
        }
        $brand->position = $request->position;
        $brand->status = $request->status;
        $brand->save();

        return redirect('/admin/brands')->with(['success' => 'Create success']);
    }

    public function postUpdateBrand($id,Request $request){
        $brand = Brand::find($id);
        // if(!$brand) return redirect('/admin/brands')->with(['danger' => 'Something was wrong']);
        // $request->name ? $brand->name = $request->name : '';
        // $request->status ? $brand->status = $request->status : '';
        // $request->position ? $brand->position = $request->position : '';
        // $request->name ? $brand->slug = AdminHelper::createSlug($request->name) : '';
        // if($request->file('image')){
            // $brand->image = UploadFile::deleteLocal($brand->image);
        // }
        // $brand->save();

        // $delete = UploadFile::deleteLocal($brand->image);

        File::delete(base_path() . '/public' . $brand->image);
        // return redirect('/admin/brands')->with(['success' => 'Update success']);
    }
}
