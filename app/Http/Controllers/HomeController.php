<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('posts', $user->posts);
    }
    public function search(Request $request)
    { 
     //   return 'me';
       $search = $request->input('search');
       $post = Post::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('body', 'LIKE', '%' . $search . '%')
        ->orWhere('cat_id', 'LIKE', '%' . $search . '%')
        ->OrderBy('title', 'asc')->get();
        return view('inc/search', compact('post'));
    }
}