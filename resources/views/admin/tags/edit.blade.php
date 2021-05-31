@extends('layouts.admin.app')

@section('section')
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="clr-green">Edit tag</h3>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{route('admin.tags.update', ['tag' => $tag->id])}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name" class="clr-green">Tag name</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name', $tag->name)}}">
          <div>
            @error('name')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <button class="my-btn"type="submit">Save</button>
      </form>
    </div>
  </div>
@endsection
