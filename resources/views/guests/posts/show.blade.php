@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('posts.index')}}" class="clr-green text-uppercase">Go Back</a>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header clr-green text-center">
            <h1>{{$post->title}}</h1>
            <h4>Category:
              @if ($post->category)
                <a href="{{route('category.index',['slug'=>$post->category ? $post->category->slug : ''])}}" class="clr-green">{{$post->category->name}}</a>
              @endif
            </h4>
          </div>
          <div class="card-body">
            <img class="mb-3" src="{{asset($post->cover)}}" alt="{{$post->title}}">
            <div class="text-justify">
              {{$post->content}}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
