@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$users->name}}</div>

                <div class="panel-body">
                    @foreach($users->posts as $post)
                    <div>
                        <a href="{{url('post/'.$post->id.'/show')}}"><h1>{{$post->title}}</h1></a>
                        <p>
                        {{substr($post->body, 0, 25)}}
                        {{strlen($post->body) > 200 ? "...":""}}
                        </p>
                        <div>{{date('M j, Y ',strtotime($post->created_at))}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
