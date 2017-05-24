@extends('adminlte::page')

@section('title', 'Edit User')

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
         <!--Start Edit User Form-->
    	   {!! Form::open(['url'=>'user/'.$users->id.'/update','method'=>'post']) !!}
          <fieldset>

            <!-- Form Name -->
            <legend>Edit {{$users->name}}</legend>

            <!-- Start Name Field-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">name</label>  
              <div class="col-md-5">
              <input id="name" name="name" placeholder="Name" value="{{$users->name}}" class="form-control input-md" required="" type="text">
              <span class="help-block"></span>  
              </div>
            </div>
            <!--End Name Field-->

             <!-- Start Email Field-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email :</label>  
                <div class="col-md-5">
                <input id="email" name="email" value="{{$users->email}}" placeholder="Email" class="form-control input-md" required="" type="text">
                <span class="help-block"></span>  
                </div>
              </div>
             <!-- End Email Field-->

             <!-- Start Password Field-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-5">
                <input id="password" name="password" placeholder="Password" class="form-control input-md" required="" type="password">
                <span class="help-block"></span>
              </div>
            </div>
            <!-- End Password Field-->

            <!-- Start Password Field-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-5">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <span class="help-block"></span>
              </div>
            </div>
            <!-- End Password Field-->

            <!-- Start Submit-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="BtnSet1"></label>
              <div class="col-md-8">
                <input type="submit" name="BtnSet1" value="Send" class="btn btn-primary">
              </div>
            </div>
            <!-- Start Submit-->

        </fieldset>
        {!! Form::close() !!}
        <!--End Create User Form-->
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop