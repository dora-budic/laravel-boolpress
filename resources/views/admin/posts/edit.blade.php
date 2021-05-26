@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>Nuovo post</h3>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{old('title', $post->title)}}">
            <div>
              @error('title')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{old('content', $post->content)}}</textarea>
            <div>
              @error('content')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <button class="btn btn-primary"type="submit">Save</button>
        </form>
      </div>
    </div>
</div>
@endsection
