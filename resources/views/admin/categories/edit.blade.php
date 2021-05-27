@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="clr-green">Edit category</h3>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="name" class="clr-green">Category name</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name', $category->name)}}">
            <div>
              @error('title')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <button class="my-btn"type="submit">Save</button>
        </form>
      </div>
    </div>
</div>
@endsection