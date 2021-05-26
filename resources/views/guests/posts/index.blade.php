@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @foreach ($posts as $post)
        <div class="col-md-3">
            <div class="card">
              <a href="{{route('posts.show',['post'=>$post->slug])}}" class="clr-green text-center">
                <div class="card-header">
                  {{$post->title}}
                </div>
                <img src="{{$post->image}}" alt="{{$post->title}}">
              </a>
            </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
