<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\PortfolioPost;
use App\Models\CategoriesWork;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BackportfolioController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_data = CategoriesWork::all();
        $portfolio = PortfolioPost::all();
        return view('backend.portfolio.index', compact('cat_data' , 'portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tittle' => 'required|max:50',
            'post_cat' => 'required|integer',
            'image'  => 'required'
        ]);
        $img = $request->file('image');
        
        if(isset($img)){
            $imgName = 'work_'. uniqid(). '.'. $img->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('work')){
                Storage::disk('public')->makeDirectory('work');
            }
            $resizeimg = Image::make($img)->resize(800, 600)->save(base_path('public/storage/work/' .$imgName));
        }else{
            $imgName = 'default.jpg';
        }
        $data = new PortfolioPost();
        $data->categories_work_id = $request->post_cat;
        $data->tittle = $request->tittle;
        $data->description = $request->description;
        $data->portfolio_img = $imgName;
        $data->save();

        return back()->with("success" , "Portfolio Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioPost  $portfoliopost
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioPost $portfoliopost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioPost $portfoliopost)
    {
        return view('backend.portfolio.edit' , compact('portfoliopost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioPost $portfoliopost)
    {
        $this->validate($request,[
            'tittle' => 'required|max:50',
            'image'  => 'image|max:10000'
        ]);
        $img = $request->file('image');
        
        if(isset($img)){
            $imgName = 'work_'. uniqid(). '.'. $img->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('work')){
                Storage::disk('public')->makeDirectory('work');
            }
            if(Storage::disk('public')->exists('work/'.$portfoliopost->portfolio_img)){
                Storage::disk('public')->delete('work/'.$portfoliopost->portfolio_img);
            }
            $resizeimg = Image::make($img)->resize(800, 600)->save(base_path('public/storage/work/' .$imgName));
        }else{
            $imgName = $portfoliopost->portfolio_img;
        }

        $portfoliopost->tittle = $request->tittle;
        $portfoliopost->description = $request->description;
        $portfoliopost->portfolio_img = $imgName;
        $portfoliopost->save();

        return back()->with("success" , "Portfolio Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioPost $portfoliopost)
    {
        if(Storage::disk('public')->exists('work/'.$portfoliopost->portfolio_img)){
            Storage::disk('public')->delete('work/'.$portfoliopost->portfolio_img);
            $portfoliopost->delete();
            return back()->with('success', "Delete Successfull");
        }
    }

    public function status($id){
    
        $data = PortfolioPost::find($id);
        if($data->status == '2'){
            $data->status = '1';
            $data->save();
            return back();
        }
        if($data->status == '1'){
            $data->status = '2';
            $data->save();
            return back();
        }
    }
}
