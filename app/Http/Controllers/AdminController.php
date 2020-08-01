<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//model
use App\User;
use App\Brand;
use App\Category;
use App\PriceType;
use App\Post;
use App\Sim;
//helper
use App\Helpers\UploadFile;
use App\Helpers\AdminHelper;
use Validator;
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

    //user
    public function postCreateUser(Request $request){
        if(!$request->name || !$request->email) return redirect()->back()->with(['danger' => 'Something was wrong']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['danger' => 'Email has already']);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = $request->type;
        // if($request->file('image')){
        //     $user->image = UploadFile::uploadLocal($request->file('image'));
        // }
        $user->password = bcrypt($request->email);
        $user->status = $request->status;
        $user->save();

        return redirect('/admin/users')->with(['success' => 'Create success']);
    }

    public function postUpdateUser($id,Request $request){
        if(!$request->name || !$request->email) return redirect()->back()->with(['danger' => 'Something was wrong']);

        $user = User::whereIn('type',[0,1])->where('id',$id)->first();
        if(!$user) return redirect('/admin/users')->with(['danger' => 'Something was wrong']);

        if($request->email != $user->email){
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|unique:users',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with(['danger' => 'Email has already']);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = $request->type;
        // if($request->file('image')){
        //     $user->image = UploadFile::uploadLocal($request->file('image'));
        // }
        $request->password ? $user->password = bcrypt($request->password) : '';
        $user->status = $request->status;
        $user->save();

        return redirect('/admin/users')->with(['success' => 'Update success']);
    }

    public function postCreateSim(Request $request){
        if(!$request->phone || !$request->price || !$request->brand_id || !$request->category_id) return redirect()->back()->with(['danger' => 'Something was wrong']);
        $brand = Brand::find($request->brand_id);
        $category = Category::find($request->category_id);
        if(!$brand || !$category) return redirect()->back()->with(['danger' => 'Something was wrong']);

        $sim = new Sim();
        // $sim->create($request->all());
        $sim->phone = $request->phone;
        $sim->price = $request->price;
        $sim->description = $request->description;
        // $sim->images = $request->images;
        $sim->category_id = $request->category_id;
        $sim->brand_id = $request->brand_id;
        $sim->visible = $request->visible;
        $sim->save();

        return redirect('/admin/sims')->with(['success' => 'Create success']);
    }

    public function postUpdateSim($id,Request $request){
        if(!$request->phone || !$request->price || !$request->brand_id || !$request->category_id) return redirect()->back()->with(['danger' => 'Something was wrong']);
        $brand = Brand::find($request->brand_id);
        $category = Category::find($request->category_id);
        if(!$brand || !$category) return redirect()->back()->with(['danger' => 'Something was wrong']);

        $sim = Sim::find($id);
        $sim->phone = $request->phone;
        $sim->price = $request->price;
        $sim->description = $request->description;
        $sim->category_id = $request->category_id;
        $sim->brand_id = $request->brand_id;
        $sim->visible = $request->visible;
        if($request->images){
            //do something to upload images
        }
        $sim->save();

        return redirect('/admin/sims')->with(['success' => 'Update success']);
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

    //category
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
        $category = Category::where([
            'id' => $id,
            'type' => 0,
        ])->first();
        if(!$category) return redirect('/admin/categories')->with(['danger' => 'Something was wrong']);
        $request->name ? $category->name = $request->name : '';
        $request->status ? $category->status = $request->status : '';
        $request->position ? $category->position = $request->position : '';
        $request->name ? $category->slug = AdminHelper::createSlug($request->name) : '';
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/categories')->with(['success' => 'Update success']);
    }

    //book
    public function postCreateBook(Request $request){
        if(!$request->name) return redirect()->back()->with(['danger' => 'Something was wrong']);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = AdminHelper::createSlug($request->name);
        $category->description = $request->description;
        $category->position = $request->position;
        $category->status = $request->status;
        $category->type = 1;
        $category->save();

        return redirect('/admin/blog-categories')->with(['success' => 'Create success']);
    }

    public function postUpdateBook($id,Request $request){
        $category = Category::where([
            'id' => $id,
            'type' => 1,
        ])->first();
        if(!$category) return redirect('/admin/blog-categories')->with(['danger' => 'Something was wrong']);
        $request->name ? $category->name = $request->name : '';
        $request->status ? $category->status = $request->status : '';
        $request->position ? $category->position = $request->position : '';
        $request->name ? $category->slug = AdminHelper::createSlug($request->name) : '';
        $request->description ? $category->description = $request->description : '';
        $category->save();

        return redirect('/admin/blog-categories')->with(['success' => 'Update success']);
    }

    //post
    public function postCreatePost(Request $request){
        if(!$request->name || !$request->content)
        return redirect()->back()->with(['danger' => 'Something was wrong']);

        //check category
        if($request->category_id != 0){
            $category = Category::find($request->category_id);
            if(!$category)
            return redirect()->back()->with(['danger' => 'Something was wrong']);
        }

        $post = new Post();
        $post->name = $request->name;
        $post->title = $request->title;
        $post->slug = AdminHelper::createSlugTime($request->name);
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->position = $request->position;

        $post->save();

        return redirect('/admin/posts')->with([
            'success' => 'Create success',
        ]);
    }

    public function postUpdatePost($slug, Request $request){
        if(!$request->name || !$request->content)
        return redirect()->back()->with(['danger' => 'Something was wrong']);

        //check category
        if($request->category_id != 0){
            $category = Category::find($request->category_id);
            if(!$category)
            return redirect()->back()->with(['danger' => 'Something was wrong']);
        }

        $post = Post::where('slug',$slug)->first();
        if(!$post) 
        return redirect('/admin/posts')->with([
            'danger' => 'Something was wrong',
        ]);

        $post->name = $request->name;
        $post->title = $request->title;
        $post->slug = AdminHelper::createSlugTime($request->name);
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->position = $request->position;

        $post->save();

        return redirect('/admin/posts')->with([
            'success' => 'Update success',
        ]);
    }

    //price type
    public function postCreatePriceType(Request $request){
        if(!$request->name)
        return redirect()->back()->with(['danger' => 'Something was wrong']);

        $price_type = new PriceType();
        $price_type->name = $request->name;
        $price_type->slug = AdminHelper::createSlug($request->name);
        $request->from ? $price_type->from = $request->from : false;
        $request->to ? $price_type->to = $request->to : false;
        $price_type->position = $request->position;
        $price_type->status = $request->status;
        $price_type->save();

        return redirect('/admin/price-types')->with([
            'success' => 'Create success',
        ]);
    }
}
