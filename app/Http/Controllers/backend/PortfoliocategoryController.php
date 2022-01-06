<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriesWork;
use App\Http\Controllers\Controller;

class PortfoliocategoryController extends Controller
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
        $data = CategoriesWork::all();
        return view('backend.portfolio.category.index', compact('data'));
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
        $this->validate($request , [
            'name' => 'required',
        ]);
        $data = new CategoriesWork();

        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->save();

        return back()->with('success', "Portfolio Category Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriesWork  $categoriesWork
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriesWork $categoriesWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriesWork  $categoriesWork
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriesWork $categoriesWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriesWork  $categoriesWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesWork $categoriesWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriesWork  $categoriesWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriesWork $categoriesWork)
    {
         $categoriesWork->delete();
         return back()->with("success" , "Category Deleted");
    }
}
