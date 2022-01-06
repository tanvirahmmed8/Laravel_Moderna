<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Header;
use App\Models\category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PortfolioPOst;
use App\Models\CategoriesWork;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
       $work_data = PortfolioPost::where('status' , 1)->get(); 
       $banner_data = Banner::all();
       return view('frontend.index', compact('banner_data' ,'work_data'));
    }
    public function portfolioshow(){
        $data = PortfolioPost::where('status' ,1)->with('CategoriesWork')->get();
        $data_cat = CategoriesWork::all();
        return view('frontend.portfolio', compact('data' ,'data_cat'));
    }
    public function blog(){
        $data = Post::with('categories')->with('user')->orderBy('id', 'DESC')->paginate(3);
        $cat_data = category::with('posts')->get();
        return view('frontend.blog' , compact('data', 'cat_data'));
    }

    // public function blogSingleView($slug){
    //     $data = Post::where('slug' , $slug)->with('categories')->with('user')->first();
    //     $cat_data = category::with('posts')->get();
    //     return view('frontend.blog-single-view', compact('data' , 'cat_data'));
    // }
    public function blogSingleView($slug){
        $data = Post::where('slug' , $slug)->with('categories')->with('user')->first();
        $data_t = Post::with('categories')->with('user')->orderBy('id', 'DESC')->paginate(3);
        $cat_data = category::with('posts')->get();
        return view('frontend.blog-single-view' , compact('data', 'cat_data', 'data_t'));
      
    }
}
