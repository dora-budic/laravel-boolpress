@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('posts.index')}}">Go Back</a>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">{{$post->title}}</div>
          <img src="{{$post->image}}" alt="{{$post->title}}">
          <div class="card-body">
            {{$post->content}}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
