@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Nuovo post</h3>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="{{route('admin.posts.store')}}" method="post">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" id="title" type="text" name="title" value="">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="8"></textarea>
          </div>

        </form>
      </div>
    </div>
</div>
@endsection
