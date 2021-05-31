@extends('layouts.admin.app')

@section('section')
  <div class="col-md-12">
    <div class="row new-post">
      <div class="col-md-12">
        <a href="{{route('admin.tags.create')}}" class="clr-green">New tag</a>
      </div>
    </div>
    <div class="row">
      @foreach ($tags as $tag)
        <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header text-center">
                {{$tag->name}}
              </div>
              <div class="card-body text-center">
                <a href="{{route('admin.tags.show',['tag'=>$tag->id])}}" class="my-btn">Show</a>
                <a href="{{route('admin.tags.edit',['tag' => $tag->id])}}" class="my-btn">Edit</a>
                <form action="{{route('admin.tags.destroy',['tag' => $tag->id])}}" method="post" class="d-inline-block">
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
