<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\Brand;
use App\Category;
use App\Post;
use App\User;

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
    
    //user
    public function pageUsers(){
        $results = User::where('type',0)->get();
        foreach($results as $result){
            $result['count'] = 0;
        }
        return view('admin.user.show')->with([
            'url' => 'users',
            'results' => $results,
        ]);
    }

    public function pageCreateUser(){
        return view('admin.user.create')->with([
            'url' => 'create-user',
        ]);
    }

    public function pageUpdateUser($id){
        $user = User::where([
            'id' => $id,
            'type' => 0,
        ])->first();
        if(!$user) return redirect('/admin/users')->with(['danger' => 'Something was wrong']);
        return view('admin.user.update')->with([
            'url' => 'users',
            'result' => $user,
        ]);
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
        $results = Category::where('type',0)->orderBy('position','DESC')->get();
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
        $category = Category::where([
            'id' => $id,
            'type' => 0,
        ])->first();
        if(!$category) return redirect('/admin/categories')->with(['danger' => 'Something was wrong']);
        return view('admin.category.update')->with([
            'url' => 'categories',
            'result' => $category,
        ]);
    }

    //book
    public function pageBooks(){
        $results = Category::where('type',1)->orderBy('position','DESC')->get();
        foreach($results as $result){
            $result['count'] = 0;
        }
        return view('admin.book.show')->with([
            'url' => 'blog-categories',
            'results' => $results,
        ]);
    }

    public function pageCreateBook(){
        return view('admin.book.create')->with([
            'url' => 'create-blog-category',
        ]);
    }

    public function pageUpdateBook($id){
        $category = Category::where([
            'id' => $id,
            'type' => 1,
        ])->first();
        if(!$category) return redirect('/admin/books')->with(['danger' => 'Something was wrong']);
        return view('admin.book.update')->with([
            'url' => 'blog-categories',
            'result' => $category,
        ]);
    }

    //post

    public function pagePosts(){
        $results = Post::all();
        return view('admin.post.show')->with([
            'url' => 'posts',
            'results' => $results,
        ]);
    }

    public function pageCreatePost(){
        $categories = Category::where('type',1)->select('id','name')->get();
        return view ('admin.post.create')->with([
            'url' => 'create-post',
            'categories' => $categories,
        ]);
    }

    public function pageUpdatePost($slug, Request $request){
        $categories = Category::where('type',1)->select('id','name')->get();
        $result = Post::where('slug',$slug)->first();
        if(!$result) return redirect('/admin/posts')->with(['danger' => 'Something was wrong',]);
        return view('admin.post.update')->with([
            'url' => 'posts',
            'result' => $result,
            'categories' => $categories,
        ]);
    }
}
