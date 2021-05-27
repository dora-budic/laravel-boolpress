@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="clr-green">New post</h3>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="{{route('admin.posts.store')}}" method="post">
          @csrf
          @method('POST')

          <div class="form-group">
            <label for="category" class="clr-green">Title</label>
            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
              <option value="">Select</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            @error('title')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="title" class="clr-green">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{old('title')}}">
            <div>
              @error('title')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="content" class="clr-green">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{old('content')}}</textarea>
            <div>
              @error('content')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <button class="my-btn" type="submit">Save</button>
        </form>
      </div>
    </div>
</div>
@endsection
