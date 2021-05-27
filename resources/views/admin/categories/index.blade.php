@extends('admin.layouts.app')

@section('section')
  <div class="col-md-12">
    <div class="row new-post">
      <div class="col-md-12">
        <a href="{{route('admin.categories.create')}}" class="clr-green">New category</a>
      </div>
    </div>
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header text-center">
                {{$category->name}}
              </div>
              <div class="card-body text-center">
                <a href="{{route('admin.categories.show',['category'=>$category->id])}}" class="my-btn">Show</a>
                <a href="{{route('admin.categories.edit',['category' => $category->id])}}" class="my-btn">Edit</a>
                <form action="{{route('admin.categories.destroy',['category' => $category->id])}}" method="post" class="d-inline-block">
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
