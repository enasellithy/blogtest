@extends('adminlte::page')

@section('title', 'Comment')

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
        <!--Start Comment Table-->
    	<table class="table table-striped custab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>Created At</th>
                    <th class="text-center">Control</th>
                </tr>
            </thead>
            @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>
                            {{substr($comment->comment, 0, 25)}}
                            {{strlen($comment->comment) > 200 ? "...":""}}
                        </td>
                        <td>{{App\Post::find($comment->post_id)->title}}</td>
                        <td>{{date('M j, Y   h::i a',strtotime($comment->updated_at))}}</td>
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="{{url('admin/'.$comment->id.'/edit')}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                            <a href="{{url('comment/'.$comment->id.'/delete')}}" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span> Delete</a>
                        </td>
                    </tr>
            @endforeach
        </table>
        <!--End Comment Table-->
    {!! $comments->links() !!}
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop