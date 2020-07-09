<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\Brand;
use App\Category;

class PageAdminController extends Controller
{
    //index
    public function pageAdminDashboard(){
        return view('admin.index')->with([
            'url' => 'dashboard',
        ]);
    }

    //auth
    public function pageLogin(){
        $user = Auth::user();
        if($user){
            if($user->type == 2) return redirect('/admin');
        }
        return view('admin.auth.login');
    }

    //brand
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

    //category
    public function pageCategories(){
        $results = Category::orderBy('position','DESC')->get();
        foreach($results as $result){
            $result['count'] = 0;
        }
        return view('admin.category.show')->with([
            'url' => 'categories',
            'results' => $results,
        ]);
    }

    public function pageCreateCategory(){
        return view('admin.category.create')->with([
            'url' => 'create-category',
        ]);
    }

    public function pageUpdateCategory($id){
        $category = Category::find($id);
        if(!$category) return redirect('/admin/categories')->with(['danger' => 'Something was wrong']);
        return view('admin.category.update')->with([
            'url' => 'categories',
            'result' => $category,
        ]);
    }
}
