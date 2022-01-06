<?php

namespace App\Http\Controllers\backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
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
        $data = Banner::all();
        return view('backend.banner.index' , compact('data'));

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
            // 'tittle' => 'max:50',
            'image'  => 'required|image|max:10000'
        ]);
        $img = $request->file('image');
        if(isset($img)){
            $imgName = 'banner_'. uniqid(). '.'. $img->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('banner')){
                Storage::disk('public')->makeDirectory('banner');
            }
            $resizeimg = Image::make($img)->resize(1024, 360)->save(base_path('public/storage/banner/' .$imgName));
        }else{
            $imgName = 'default.jpg';
        }
        $data = new Banner();
        $data->tittle = $request->tittle;
        $data->description = $request->description;
        $data->image = $imgName;
        $data->btn_text = $request->btn_text;
        $data->btn_url = $request->btn_url;
        $data->save();

        return back()->with("success" , "Banner Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit' , compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request,[
            // 'tittle' => 'max:50',
            'image'  => 'image|max:10000'
        ]);
        $img = $request->file('image');
        if(isset($img)){
            $imgName = 'banner_'. uniqid(). '.'. $img->getClientOriginalExtension();

            // if(!Storage::disk('public')->exists('banner')){
            //     Storage::disk('public')->makeDirectory('banner');
            // }
            if(Storage::disk('public')->exists('banner/' . $banner->image)){
                Storage::disk('public')->delete('banner/' . $banner->image);
            }
            $resizeimg = Image::make($img)->resize(1024, 360)->save(base_path('public/storage/banner/' .$imgName));
        }else{
             $imgName = $banner->image;
        }

        $banner->tittle = $request->tittle;
        $banner->description = $request->description;
        $banner->image = $imgName;
        $banner->btn_text = $request->btn_text;
        $banner->btn_url = $request->btn_url;
        $banner->save();

        return back()->with("success" , "Banner Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if(Storage::disk('public')->exists('banner/' . $banner->image)){
            Storage::disk('public')->delete('banner/' . $banner->image);
        }

        // $abc = !Storage::disk('public')->exists('banner/' . $banner->image);
        // dd($abc);
        $banner->delete();
        return back()->with("success" , "Banner Deleted");
    }
}
