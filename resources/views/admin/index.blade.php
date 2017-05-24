@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!--Start Content-->
    <section class="main-page-admin">
    	<div class="row">
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            	<i class="ion ion-ios-cart-outline"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-number">{{$users->count()}}</span>
              <a href="{{url('user')}}">Users</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="i fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">{{$posts->count()}}</span>
              <a href="{{url('admin/post')}}">Posts</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-posts-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">{{$comment->count()}}</span>
              <a href="{{url('admin/comment')}}">Comments</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!--End Content-->
@stop

@section('css')
    <link rel="stylesheet" href="public/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop