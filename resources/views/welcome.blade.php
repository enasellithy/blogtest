@extends('layouts.app')

@section('content')
<!-- Page Content -->
       <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('public/img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <hr class="small">
                            <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <!-- Blog Column -->
                @foreach($posts as $post)
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                    <a href="post.html">
                        <a href="post/{{$post->id}}/show">
                            <h2 class="post-title">
                            {{$post->title}}
                           </h2>
                        </a>
                        <h3 class="post-subtitle">
                            {{substr($post->body, 0, 25)}}
                            {{strlen($post->body) > 200 ? "...":""}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by 
                        <a href="{{url('user/'.$post->user_id.'/show')}}">{{App\User::find($post->user_id)->name}}
                        </a>
                         {{date('M j, Y h:: i a',strtotime($post->created_at))}}</p>
                </div>
                <hr>
                </div>
                @endforeach
                    <div class="text-center"> 
                       {!! $posts->links() !!}
                    </div>
            </div>
        </div>

        {!! Form::open(['url'=>'sub','method'=>'post']) !!}
        <input type="tel" name="mobile" required="required">
        <input type="submit" value="Send">
        {!! Form::close() !!}
                   
@endsection
