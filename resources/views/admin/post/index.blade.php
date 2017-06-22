@extends('adminlte::page')

@section('title', 'Post')

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
    	<table class="table table-striped custab">
            <thead>
                <a href="{{route('post.create')}}" class="btn btn-primary btn-xs pull-right btn-lg">
                <b>+</b> Add New Post</a>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>By</th>
                    <th>Count Comment</th>
                    <th>Created At</th>
                    <th class="text-center">Control</th>
                </tr>
            </thead>
            @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{App\Model\User::find($post->user_id)->name}}</td>
                        <td>{{$post->comment->count()}}</td>
                        <td>{{date('M j, Y   h::i a',strtotime($post->updated_at))}}</td>
                        <td class="text-center">
                            <a class='btn btn-primary btn-xs' href="{{url('post/'.$post->id.'/show')}}">
                                <span class="glyphicon glyphicon-book"></span> Show</a> 
                            <a class='btn btn-info btn-xs' href="{{url('post/'.$post->id.'/edit')}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                            <a href="{{url('post/'.$post->id.'/delete')}}" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span> Delete</a>
                        </td>
                    </tr>
            @endforeach
        </table>
    {!! $posts->links() !!}
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop