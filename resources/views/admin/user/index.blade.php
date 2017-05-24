@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!--Start Content-->
    <!-- Start Message Session-->
    <div>
      @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(count($errors) > 0)
     <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
           @endforeach
        </ul>
     </div>
    @endif
    </div>
    <!-- End Message Session-->
    <section class="main-page-admin">
        <!--Start User Table-->
    	<table class="table table-striped custab">
            <thead>
            <a href="{{route('user.create')}}" class="btn btn-primary btn-xs pull-right btn-lg">
                <b>+</b> Add New User</a>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Last Active</th>
                    <th class="text-center">Control</th>
                </tr>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{date('M j, Y   h::i a',strtotime($user->updated_at))}}</td>
                    <td class="text-center">
                        <a class='btn btn-primary btn-xs' href="user/{{$user->id}}/show">
                            <span class="glyphicon glyphicon-book"></span> Show</a> 
                        <a class='btn btn-info btn-xs' href="user/{{$user->id}}/edit">
                            <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                        <a href="user/{{$user->id}}/delete" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <!--End User Table-->
    {!! $users->links() !!}
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop