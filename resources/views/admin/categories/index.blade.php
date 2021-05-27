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
    <div class="col-md-10">
      <div class="row new-post">
        <div class="col-md-12">
          <a href="{{route('admin.categories.create')}}" class="clr-green">New category</a>
        </div>
      </div>
      <div class="row">
        @foreach ($categories as $category)
          <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header text-center">
                  {{$category->name}}
                </div>
                <div class="card-body text-center">
                  <a href="{{route('admin.categories.show',['category'=>$category->id])}}" class="my-btn">Show</a>
                  <a href="{{route('admin.categories.edit',['category' => $category->id])}}" class="my-btn">Edit</a>
                  <form action="{{route('admin.categories.destroy',['category' => $category->id])}}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input class="my-btn-tr" type="submit" name="delete" value="Delete">
                  </form>
                </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
