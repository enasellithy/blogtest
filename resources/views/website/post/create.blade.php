@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
        <div class="col-md-8 col-md-offset-2">
             <!--Start Form Post-->
             <div class="form-area" style="color:#000;">  
                {!! Form::open(['route'=>'post.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
                <br style="clear:both">
                            <h3 style="margin-bottom: 25px; text-align: center;">Add New Post</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="image" name="image" placeholder="image" >
                            </div>
                            <div class="form-group">
                                <textarea name="body" col="5" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" required>
                            </div>
                            <div class="form-group">
                              {!! Form::select('send', send(), ['class'=>'form-control']) !!}
                            </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
                {!! Form::close() !!}
              </div>
             <!--End Form Post-->
        </div>
    </div>
</div>
@endsection
