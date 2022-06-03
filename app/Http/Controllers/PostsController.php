<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // $posts = Post::all();
      //  return Post::where('title','Post Two')->get();
       // $posts= DB::select('SELECT * FROM posts');
      //  $posts = Post::orderBy('title','desc')->take(1)->get();
      $posts = Post::orderBy('created_at','asc')->paginate(0);
      //$posts = Post::orderBy('title','asc')->get();
      return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat= Category::OrderBy('id', 'asc')->pluck('category', 'category')->prepend('Select Category', '')->toArray();
        return view('posts.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $this->validate($request,[
            'title' =>'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
                ]);
         //   handle file upload
           if($request->hasfile('cover_image')){
                //Get file name with the extension
               $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
               // Get just file name
               $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
               // Get just extension
              $extension = $request->file('cover_image')->getClientOriginalExtension();
                //File name to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                //upload image
               $path = $request->file('cover_image')->move(public_path() . '/public/storage/', $fileNameToStore);
                
            } 
   
            //create post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->cat_name = $request->input('category_name');
            $post->tags = $request->input('tags');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $fileNameToStore;
             $post->save();
            return redirect('/posts')->with('success','Post Created');
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $post = Post::find($id);
            return view('posts.show')->with('post',$post);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cat= Category::OrderBy('id', 'asc')->pluck('category', 'category')->toArray();

        //check for correct user
        if(auth()->user()->id !==$post->user_id){
        return redirect('/posts')->with('error','unauthorized page'); 
        }
        return view('posts.edit', compact('cat', 'post'));  
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
       //  $request->all();
        $this->validate($request,[
            'title' =>'required',
            'body' => 'required'
                ]);
            // handle file upload
           if($request->hasfile('cover_image')){
                //Get file name with the extension
               $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
               // Get just file name
               $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
               // Get just extension
              $extension = $request->file('cover_image')->getClientOriginalExtension();
                //File name to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                //upload image
               $path = $request->file('cover_image')->move(public_path() . '/public/storage/', $fileNameToStore);
                
            }
            //create post
            $post =Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->cat_name = $request->input('category_name');
            $post->tags = $request->input('tags');
            if($request->hasfile('cover_image')){
                 $post->cover_image = $fileNameToStore;
            }
            $post->update();
            return redirect('/posts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        //check for correct user
        if(auth()->user()->id !==$post->user_id){
        return redirect('/posts')->with('error','unauthorized page'); 
        }
        if($post->cover_image !== 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/home')->with('success', 'Post Removed');
    }
}