@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @foreach ($posts as $post)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  {{$post->title}}
                </div>
                <div class="card-body text-center">
                  <a href="{{route('posts.show',['slug'=>$post->slug])}}" class="my-btn">Show</a>
                </div>
            </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
