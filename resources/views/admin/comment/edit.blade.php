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
        <!--Start Form Comment-->
        {!! Form::open(['url'=>'comment/'.$comments->id.'/update']) !!}
        <div class="form-group">
            <textarea name="comment" value="{{$comments->comment}}" class="form-control" rows="3">
                {{$comments->comment}}
            </textarea>
            <input name="post_id" value="{{App\Post::find($comments->post_id)->id}}" type="hidden">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
        <!--End Form Comment-->
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop