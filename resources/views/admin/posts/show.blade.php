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
            <li><a href="#"><i class="fas fa-font"></i>Categories</a></li>
            <li><a href="#"><i class="fas fa-tag"></i>Tags</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header clr-green">
            <h1>{{$post->title}}</h1>
            <h4>Category:
              @if ($post->category)
                <a href="{{route('category.index',['slug'=>$post->category ? $post->category->slug : ''])}}" class="clr-green">{{$post->category->name}}</a>
              @endif
            </h4>
          </div>
          <div class="card-body">
            {{$post->content}}
            <div class="mt-3">
              <a href="{{route('admin.posts.edit',['post' => $post->id])}}" class="my-btn">Edit</a>
              <form class="d-inline-block" action="{{route('admin.posts.destroy',['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <input class="my-btn-tr" type="submit" name="delete" value="Delete">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
