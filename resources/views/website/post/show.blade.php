@extends('layouts.app')

@section('content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1>{{$posts->title}}</h1>
                    <p style="max-width:700px;">
                        <img class="img-responsive" 
                             src="{{url('public/images/post/'.$posts->image)}}" 
                             class="img-responsive"
                             alt="blog"
                             title="blog" />
                    </p>
                    <p>{{$posts->body}}</p>
                    <div class="slug">
                        <span>
                          <a href="{{url('post/'.$posts->id.'/show')}}">{{$posts->slug}}</a>
                        </span>
                    </div>
                    <h4>Post By 
                        <a href="{{url('user/'.$posts->user_id.'/show')}}">{{App\User::find($posts->user_id)->name}}</a>
                    </h4>
                    <div class="data">
                        <span><i class="fa fa-calendar-o"></i>{{date('M j, Y h:: i a',strtotime($posts->created_at))}}</span>
                    </div>
                    <h2 class="section-heading">Comments</h2>

                    <p>
                        <div class="well">
                            <h4>Leave a Comment:</h4>
                            {!! Form::open(['url'=>'comment/store','method'=>'post']) !!}
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                    <input name="post_id" value="{{$posts->id}}" type="hidden">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </p>


                   <div class="comment">
                    <ul>
                        @foreach($posts->comment as $comment)
                        <li>
                            <div>
                            {{$comment->comment}}
                                <h4 class="media-heading">
                                 <small>{{date('M j, Y h:: i a',strtotime($comment->created_at))}}</small>
                                </h4>
                           </div>
                        </li>
                        @endforeach
                    </ul>
                   </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection
