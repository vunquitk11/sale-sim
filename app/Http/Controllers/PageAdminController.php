<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//Helper
use App\Helpers\Pagination;

//model
use App\Brand;
use App\Category;
use App\Post;
use App\User;
use App\Sim;

class PageAdminController extends Controller
{
    private $MAX_VALUE = 10;
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

    // $page = $request->query('page') ? $request->query('page') : 1;
    // $number = $users->count();
    // $totalPage = (int) ($number / $this->MAX_VALUE) + (($number % $this->MAX_VALUE) !== 0);
    // $previousPage = ($page == 1) ? 1 : ($page - 1);
    // $nextPage = ($page == $totalPage) ? $totalPage : ($page + 1);
    // $listPages = Pagination::initArray($page, $totalPage);
    // $users = $users->orderBy('created_at','DESC')->skip($this->MAX_VALUE * ($page - 1))->take($this->MAX_VALUE)->get();

    // $fullUrl = explode('?', $_SERVER['REQUEST_URI']);
    // $currUrl = $fullUrl[0];

    // if($users){
    //     return view('admin.user.users')->with([
    //         'type' => $type,
    //         'url' => $url,
    //         'users' => $users,
    //         'currUrl' => $currUrl,
    //         'totalPage' => $totalPage,
    //         'previousPage' => $previousPage,
    //         'nextPage' => $nextPage,
    //         'listPages' => $listPages,
    //         'currPage' => $page,
    //     ]);
    // }

    //sim
    public function pageSims(Request $request){
        $sims = Sim::where([]);
        $page = $request->query('page') ? $request->query('page') : 1;
        $number = $sims->count();
        $totalPage = (int) ($number / 20) + (($number % 20) !== 0);
        $previousPage = ($page == 1) ? 1 : ($page - 1);
        $nextPage = ($page == $totalPage) ? $totalPage : ($page + 1);
        $listPages = Pagination::initArray($page, $totalPage);
        $sims = $sims->orderBy('created_at','DESC')->skip(20 * ($page - 1))->take(20)->get();

        $fullUrl = explode('?', $_SERVER['REQUEST_URI']);
        $currUrl = $fullUrl[0];

        foreach($sims as $sim){
            $brand = Brand::find($sim->brand_id);
            $category = Category::find($sim->category_id);
            if($brand && $category){
                $sim['brand_name'] = $brand->name;
                $sim['category_name'] = $category->name;
            }
        }

        return view('admin.sim.show')->with([
            'url' => 'sims',
            'results' => $sims, 
            'currUrl' => $currUrl,
            'totalPage' => $totalPage,
            'previousPage' => $previousPage,
            'nextPage' => $nextPage,
            'listPages' => $listPages,
            'currPage' => $page,
        ]);
    }

    public function pageCreateSim(){
        $brands = Brand::where('status',1)->select('id','name','position')->orderBy('position','DESC')->get();
        $categories = Category::where([
            'type' => 0,
            'status' => 1,
        ])->select('id','name','position')->orderBy('position','DESC')->get();

        return view('admin.sim.create')->with([
            'url' => 'create-sim',
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function pageUpdateSim($id){
        $brands = Brand::where('status',1)->select('id','name','position')->orderBy('position','DESC')->get();
        $categories = Category::where([
            'type' => 0,
            'status' => 1,
        ])->select('id','name','position')->orderBy('position','DESC')->get();

        $sim = Sim::find($id);
        if(!$sim) return redirect('/admin/sims')->with(['danger' => 'Something was wrong']);

        return view('admin.sim.update')->with([
            'url' => 'update-sim',
            'result' => $sim,
            'brands' => $brands,
            'categories' => $categories,
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

    //price category
    public function pageCreatePriceType(){
        return view('admin.price_category.create')->with([
            'url' => 'create-price-category',
        ]);
    }

    public function pageUpdateCreatePriceType($slug){
        $result = PriceType::where('slug',$slug)->first();
        if(!$result) return redirect('/admin/price-types')->with(['danger' => 'Something was wrong',]);
        return view('admin.price_type.update')->with([
            'url' => 'update-price-type',
            'result' => $result,
        ]);
    }
}
