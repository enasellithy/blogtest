<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use Redirect;
use App\Post;
use App\Comment;

class UserController extends Controller
{
    // To Show Users in Adminpanel
    public function index()
    {
        $users = DB::table('users')->where('admin',0)
                                    ->orderBy('created_at','desc')
                                    ->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    // Create User By Admin
    public function create()
    {
        return view('admin.user.create');
    }

    // Store User By Admin
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        Session::flash('success','User Create');
        return Redirect::route('user.index');
    }

    // Show User 
    public function show($id)
    {
        $users = User::find($id);
        return view('website.user.show')->withUsers($users);
    }

    // Edit User By Admin
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.user.edit')->withUsers($users);
    }

    // Update User By Admin
    public function update(Request $request, $id)
    {
        $this->Validate($request,[ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        Session::flash('success','User Update');
        return Redirect::route('user.index');
    }

    // Delete User By Admin
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        Session::flash('success','User Delete');
        return Redirect::route('user.index');
    }
}
