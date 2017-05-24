<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use App\Comment;

class PostController extends Controller
{
    // Get Posts In Front Page
    public function index()
    {
        $posts = Post::with('comment')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('welcome',compact('posts'));
    }

    // Create Post
    public function create()
    {
        return view('website.post.create');
    }

    // Save Post
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'title' => 'required|string|min:5|max:200',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'body' => 'required|string|min:15',
            'slug' => 'required|alpha_dash|min:5|max:255',
            ]);
        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->slug = $request->slug;
        $posts->user_id = Auth::user()->id;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            Image::make($image)->save($location);
            $posts->image = $filename;
        }
        $posts->save();
        Session::flash('success','Post Add');
        return Redirect::route('home');
    }

    // Show Post In Front
    public function show($id)
    {
        $comment = Comment::all();
        $posts = Post::find($id);
        return view('website.post.show',compact('comments'))->withPosts($posts);
    }

    // Edit Post
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('website.post.edit')->withPosts($posts);
    }

    // Update Post
    public function update(Request $request, $id)
    {
        $this->Validate($request,[ 
            'title' => 'required|string|min:5|max:200',
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'body' => 'required|string|min:15',
            'slug' => 'alpha_dash|min:5|max:255',
            ]);
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->slug = $request->slug;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            Image::make($image)->save($location);
            $posts->image = $filename;
        }
        $posts->user_id = Auth::id();
        Session::flash('success','Post Update');
        return Redirect::route('home');
    }

    // Delete Post
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete())
        {
            // Delete Comments Belong To Post
            $post->comment()->delete();
            Session::flash('success','Posts Deleted');
            return redirect()->back();

        }
    }

    // Get Single By Slug Belongs To Post
    public function getSingle($slug)
    {
        $posts = Post::where('slug','=', $slug)->first();
    }
}
