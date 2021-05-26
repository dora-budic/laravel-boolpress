@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('admin.posts.index')}}" class="clr-green text-uppercase">Go Back</a>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header clr-green">{{$post->title}}</div>
          <img src="{{$post->image}}" alt="{{$post->title}}">
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
