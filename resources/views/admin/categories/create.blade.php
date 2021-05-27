@extends('admin.layouts.app')

@section('section')
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="clr-green">New category</h3>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="name" class="clr-green">Category name</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name')}}">
          <div>
            @error('name')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <button class="my-btn" type="submit">Save</button>
      </form>
    </div>
  </div>
@endsection
