@extends('layouts.admin.app')

@section('section')
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="clr-green">Edit post</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="category" class="clr-green">Title</label>
          <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
            <option value="">Select</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="title" class="clr-green">Title</label>
          <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{old('title', $post->title)}}">
          <div>
            @error('title')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="content" class="clr-green">Content</label>
          <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{old('content', $post->content)}}</textarea>
          <div>
            @error('content')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="cover" class="clr-green">Cover</label>
          <div>
            <img class="thumb mb-2" src="{{asset($post->cover)}}" alt="{{$post->title}}">
          </div>
          <input class="form-control-file @error('cover') is-invalid @enderror" id="cover" type="file" name="cover" value="">
          <div>
            @error('cover')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <button class="my-btn"type="submit">Save</button>
      </form>
    </div>
  </div>
@endsection
