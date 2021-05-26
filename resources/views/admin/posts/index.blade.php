@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('admin.posts.create')}}">Create post</a>
    </div>
  </div>
    <div class="row justify-content-center">
      @foreach ($posts as $post)
        <div class="col-md-3">
            <div class="card">
              <a href="{{route('admin.posts.show',['post'=>$post->slug])}}">
                <div class="card-header">
                  {{$post->title}}
                  <img src="{{$post->image}}" alt="{{$post->title}}">
                </div>
              </a>
                <div class="card-body">
                  <div>
                    <a href="{{route('admin.posts.edit',['post' => $post->id])}}" class="btn btn-primary">Edit</a>
                    <form class="" action="{{route('admin.posts.destroy',['post' => $post->id])}}" method="post">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-primary" type="submit" name="delete" value="Delete">
                    </form>
                  </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
