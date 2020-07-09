<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\User;
use App\Brand;
use App\Category;
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
        if(!$brand) return redirect('/admin/brands')->with(['danger' => 'Something was wrong']);
        $request->name ? $brand->name = $request->name : '';
        $request->status ? $brand->status = $request->status : '';
        $request->position ? $brand->position = $request->position : '';
        $request->name ? $brand->slug = AdminHelper::createSlug($request->name) : '';
        if($request->file('image')){
            File::delete(base_path() . '/public' . $brand->image);
            $brand->image = UploadFile::uploadLocal($request->file('image'));
        }
        $brand->save();

        return redirect('/admin/brands')->with(['success' => 'Update success']);
    }

    public function postDeleteBrand($id){

    }

    //brand
    public function postCreateCategory(Request $request){
        if(!$request->name) return redirect()->back()->with(['danger' => 'Something was wrong']);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = AdminHelper::createSlug($request->name);
        $category->description = $request->description;
        $category->position = $request->position;
        $category->status = $request->status;
        $category->save();

        return redirect('/admin/categories')->with(['success' => 'Create success']);
    }

    public function postUpdateCategory($id,Request $request){
        $category = Category::find($id);
        if(!$category) return redirect('/admin/categories')->with(['danger' => 'Something was wrong']);
        $request->name ? $category->name = $request->name : '';
        $request->status ? $category->status = $request->status : '';
        $request->position ? $category->position = $request->position : '';
        $request->name ? $category->slug = AdminHelper::createSlug($request->name) : '';
        $request->description ? $category->description = $request->description : '';
        $category->save();

        return redirect('/admin/categories')->with(['success' => 'Update success']);
    }
}
