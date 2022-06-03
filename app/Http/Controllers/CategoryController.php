<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    public function index()
    {
     //   return 1234;
        $category = Category::orderBy('created_at','asc')->get();
      //$posts = Post::orderBy('title','asc')->get();
      return view('category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category' =>'required'
                ]);
            //create post
            $category = new Category;
            $category->category = $request->input('category');
           $category->user_id = auth()->user()->id;
            $category->save();
            return redirect('/category')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
        //check for correct user
        if(auth()->user()->id !==$category->user_id){
        return redirect('/category')->with('error','unauthorized page'); 
        }
        return view('category.edit')->with('category',$category);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request,[
            'category' =>'required',
                ]);
     
            //create post
            $category =Category::find($id);
            $category->category = $request->input('category');
            $category->save();
            return redirect('/category')->with('success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $category =Category::find($id);
        //check for correct user
        if(auth()->user()->id !==$category->user_id){
        return redirect('/category')->with('error','unauthorized page'); 
        }
      
        $category->delete();
        return redirect('/category')->with('success', 'Category Removed');
    }
}