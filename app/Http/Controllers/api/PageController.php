<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//model
use App\Sim;
use App\Category;
use App\Brand;
use App\PriceType;

class PageController extends Controller
{
    //
    public function getCategories(){
        $results = Category::where('status',1)->select('name','slug','position')->orderBy('position','DESC')->get();
        return response()->json([
            'message' => 'success',
            'results' => $results,
        ],200);
    }

    public function getHighlightSim(Request $request){
        $results = Sim::where([
            'status' => 0, //chua ai mua,
            'visible' => 1,
        ])->select('phone','brand_id','price')->orderBy('price','DESC')->take(20)->get();

        foreach($results as $result){
            $brand = Brand::where(['status' => 1,'id' => $result->brand_id])->first();
            $brand ? $result['brand_slug'] = $brand->slug : false;
            $brand ? $result['brand_image'] = $brand->image : false;
            $result->setHidden(['brand_id','position']);
        }

        return response()->json([
            'message' => 'success',
            'results' => $results,
        ],200);
    }

    public function getPriceType(Request $request){
        $results = PriceType::where('status',1)
        ->orderBy('position','ASC')
        ->select('name','slug')
        ->take(10)->get();

        return response()->json([
            'message' => 'success',
            'results' => $results,
        ],200);
    }
}
