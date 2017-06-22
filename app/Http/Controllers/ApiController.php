<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Post;
use Illuminate\Http\Response;
use Auth;

class ApiController extends Controller
{
    public function post()
    {
    	$posts = Post::all();
    	$response = [
				'status' => 1,
				'msg' => 'test',
				'data' => $posts
				];
		return response()->json($response);
    	/*return response()->json($posts);
    	/*return Response::json([
         			'data' => $posts
    			], 200);*/
    }

    public function authorPost($id)
    {
        $users = User::find($id);
        $posts = Post::all();
        //$query = DB::select('posts')->where('id','user_id');

    	$response = [
				'status' => 1,
				'msg' => 'test',
				'data' => $users
				];
		return response()->json($response);
    	/*$response = ["user" => [
    				'id' => (int) $id
    	]];
    	/*return Response::json([
         				'message' => $post
    			], 400);*/
    	//return response()->json($post);

    }

   /* public function apiUser(Request $request)
    {
        if(Auth::guard('web')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password');
            ]))
        {
            $user = auth()->guard('web')->user();
            $user = User::find(auth()->user()->id);
            $user->token_time_out = strtotime('+1 munite');
            $user->save();
            return $user->api_token;
        }
    }*/

    public function getUser()
    {
        //$user = User::find($id);
        /*$user = User::all();

        return $user->toJson();*/
        $min = collect([1, 2, 3, 4, 5])->rand();
        //$diff = collect([2, 4, 6, 8]);
        //$math1 = $diff + $collection;

        return $min;
    }
}
