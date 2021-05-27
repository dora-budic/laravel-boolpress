@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2">
        <div class="menu">
          <ul>
            <li><a href="{{route('admin.index')}}"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="{{route('admin.posts.index')}}"><i class="far fa-file-alt"></i>Posts</a></li>
            <li><a href="#"><i class="far fa-user"></i>Users</a></li>
            <li><a href="{{route('admin.categories.index')}}"><i class="fas fa-font"></i>Categories</a></li>
            <li><a href="#"><i class="fas fa-tag"></i>Tags</a></li>
          </ul>
        </div>
    </div>
    <div class="col-md-8">
      @yield('section')
    </div>
  </div>
</div>
@endsection
