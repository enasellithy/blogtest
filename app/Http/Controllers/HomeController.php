<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\User;
use DB;
use Auth;
use Illuminate\Http\Response;

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
        /*if (!Auth::check()) {
            return response()->json([
                'error' => "You are not authenticated",
                'data' => $posts
            ], 401);
        }*/
        return view('website.user.home')->withPosts($posts);
    }
}
