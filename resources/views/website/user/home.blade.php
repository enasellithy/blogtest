@extends('layouts.app')
@section('css')
{!! Html::style('public/css/home.css') !!}
@endsection
@section('content')
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
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
            <div class="col-md-12 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="user-dashboard">
                    <h1>Hello, {{Auth::user()->name}}</h1>
                    <a href="{{route('post.create')}}" class="btn btn-success">Add New Post</a></li>
                    <div class="row">
                        @foreach($posts as $post)
                            @if(Auth::id() == $post->user_id)
                              <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                                <div class="sales col-md-12">
                                    <h2>{{$post->title}}</h2>
                                    <hr>
                                    <div>
                                       <p>
                                        {{substr($post->body, 0, 25)}}
                                        {{strlen($post->body) > 200 ? "...":""}}
                                       </p>
                                       <div class="pull-right">{{date('M j, Y ',strtotime($post->created_at))}}</div>
                                       <span class="pull-left">Write By: {{App\User::find($post->user_id)->name}}</span>
                                    </div>
                                    
                                </div>
                                <div class="btn-group">
                                   <a href="post/{{$post->id}}/show" class="btn btn-info">Read</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="post/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="post/{{$post->id}}/delete" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                         @endforeach
                    </div>
                </div>
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
{!! Html::script('public/js/home.js') !!}
@endsection