<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        $data = Post::with('categories')->with('user')->get();
        $trash_data = Post::onlyTrashed()->with('categories')->with('user')->get();

        return view('backend.post.index' , compact('data' , 'trash_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_data = category::all();
        return view('backend.post.create' , compact('cat_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'tittle' => 'required',
          'post_image' => 'image|max:5150',
          'post_video' => '',
          'post_body' => 'required',
          'categories' => 'required'
        ]);

        // image validation
        $img = $request->file('post_image');
        if(isset($img)){
            $imgName = Str::slug($request->tittle). uniqid(5). '.'. $img->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            $resizeimg = Image::make($img)->resize(800, 450)->save(base_path('public/storage/post/' .$imgName));
        }else{
           $imgName = '';
        }

        // video validation
        $vid = $request->file('post_video');
        if(isset($vid)){
            $vidName = Str::slug($request->tittle). uniqid(5). '.'. $vid->getClientOriginalExtension();
            
            if(!Storage::disk('public')->exists('postvideo')){
                Storage::disk('public')->makeDirectory('postvideo');
            }
            $resizeimg = ($vid)->move('storage/postvideo/', $vidName);
            
        }else{
           $vidName = '';
        }


        $data = new Post();
        $data->user_id = Auth::id();
        $data->tittle = $request->tittle;
        $data->slug = Str::slug($request->tittle);
        $data->post_image = $imgName;
        $data->post_video = $vidName;
        $data->post_body = $request->post_body;
        $data->save();

        $data->categories()->attach($request->categories);
        
        return back()->with('success', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $cat_data = category::all();
        return view('backend.post.edit' , compact('post' , 'cat_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'tittle' => 'required',
            'post_body' => 'required',
            'categories' => 'required'
        ]);
        $img = $request->file('post_image');

        if(isset($img)){
            $imgName = Str::slug($request->tittle). uniqid() . '.' . $img->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            if(Storage::disk('public')->exists('post/' . $post->post_image)){
                Storage::disk('public')->delete('post/' . $post->post_image);
            }
            $resizeimg = Image::make($img)->resize(1024, 360)->save(base_path('public/storage/post/' .$imgName));
        }else{
             $imgName = $post->post_image;
        }


        $vid = $request->file('post_video');
        if(isset($vid)){
            $vidName = Str::slug($request->tittle). uniqid(5). '.'. $vid->getClientOriginalExtension();
          
            if(!Storage::disk('public')->exists('postvideo')){
                Storage::disk('public')->makeDirectory('postvideo');
            }
            if(Storage::disk('public')->exists('postvideo/' . $post->post_video)){
                Storage::disk('public')->delete('postvideo/' . $post->post_video);
            }
            $resizeimg = ($vid)->move('storage/postvideo/', $vidName);
            
        }else{
           $vidName = $post->post_video;
        }

        
        $post->user_id = Auth::id();
        $post->tittle = $request->tittle;
        $post->slug = Str::slug($request->tittle);
        $post->post_image = $imgName;
        $post->post_body = $request->post_body;
        $post->save();

        $post->categories()->sync($request->categories);

        return back()->with("success" , "Post Update Successfull");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // if(!Storage::disk('public')->exists('post/' . $post->post_image)){
        //     Storage::disk('public')->delete('post/' . $post->post_image);
        // }
        $post->delete();
        // $post->categories()->detach();

        return back()->with("danger" , "Post Deleted");
    }

    public function restore($id){

        $data = Post::onlyTrashed()->find($id);
        $data->restore();
        return back()->with("success" , "Post Restored");
    }

    public function permanentDelete($id){

        $data = Post::onlyTrashed()->find($id);

        if(Storage::disk('public')->exists('post/' . $data->post_image)){
            Storage::disk('public')->delete('post/' . $data->post_image);
        }
        if(Storage::disk('public')->exists('postvideo/' . $data->post_video)){
            Storage::disk('public')->delete('postvideo/' . $data->post_video);
        }
        $data->categories()->detach();

        $data->forceDelete();
        return back()->with("success" , "Post Deleted");
    }
}
