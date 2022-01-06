<?php

namespace App\Http\Controllers\backend;

use App\Models\Header;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
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

    public function index(){
        $data = Header::all();
        return view('backend.header.index', compact('data'));
    }

    public function store(Request $request){

       
        
        $this->validate($request,[
            'logo' => 'required',
            'title' => 'required',
        ]);
        $img = $request->file('logo');

        if(isset($img)){ 
            $imgName = Str::slug($request->title). uniqid() . '.' . $img->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('logo')){
                Storage::disk('public')->makeDirectory('logo');
            }
            $resizeimg = Image::make($img)->resize(130, 40)->save(base_path('public/storage/logo/' .$imgName));
        }else{
             $imgName = 'default.png';
        } 

        $data = new Header();
        $data->logo = $imgName;
        $data->title = $request->title;
         $data->save();

        return back()->with("success" , "Logo Update Successfull");
    }

    public function edit()
    {
        $data = Header::all();
        return view('backend.header.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $data = Header::find($id);
        
        $this->validate($request,[
            'logo' => 'required',
        ]);
        $img = $request->file('logo');

        if(isset($img)){
            $imgName = Str::slug($request->title). uniqid() . '.' . $img->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('logo')){
                Storage::disk('public')->makeDirectory('logo');
            }
            if(!Storage::disk('public')->exists('logo/' . $data->logo)){
                Storage::disk('public')->delete('logo/' . $data->logo);
            }
            $resizeimg = Image::make($img)->resize(130, 40)->save(base_path('public/storage/logo/' .$imgName));
        }else{
             $imgName = $data->logo;
        } 

        $data->logo = $imgName;
        $data->title = $request->title;
        $data->save();

        return back()->with("success" , "Logo Update Successfull");
    }
}
