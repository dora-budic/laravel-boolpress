@extends('layouts.admin.app')

@section('section')
  <div class="row new-post">
    <div class="col-md-12">
      <a href="{{route('admin.posts.create')}}" class="clr-green">New post</a>
    </div>
  </div>
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header text-center clr-green">
              {{$post->title}}
            </div>
            <div class="card-body text-center">
              <div>
                <img class="mb-3" src="{{asset($post->cover)}}" alt="{{$post->title}}">
              </div>
              <a href="{{route('admin.posts.show',['post'=>$post->slug])}}" class="my-btn">Show</a>
              <a href="{{route('admin.posts.edit',['post' => $post->id])}}" class="my-btn">Edit</a>
              <form action="{{route('admin.posts.destroy',['post' => $post->id])}}" method="post" class="d-inline-block">
                @csrf
                @method('DELETE')
                <input class="my-btn-tr" type="submit" name="delete" value="Delete">
              </form>
            </div>
          </div>
      </div>
    @endforeach
  </div>
@endsection
