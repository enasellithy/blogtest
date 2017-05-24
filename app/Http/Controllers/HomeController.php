<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;
use Auth;

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

    // Get Dasboard For Users
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('website.user.home')->withPosts($posts);
    }
}
