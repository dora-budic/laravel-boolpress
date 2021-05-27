@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row new-post">
    <div class="col-md-12 text-center">
      <a href="{{route('admin.posts.create')}}" class="clr-green">Create post</a>
    </div>
  </div>
  <div class="row justify-content-center">
    @foreach ($posts as $post)
      <div class="col-md-3">
          <div class="card">
            <a href="{{route('admin.posts.show',['post'=>$post->slug])}}" class="clr-green">
              <div class="card-header text-center">
                {{$post->title}}
              </div>
            </a>
              <div class="card-body text-center">
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
</div>
@endsection
