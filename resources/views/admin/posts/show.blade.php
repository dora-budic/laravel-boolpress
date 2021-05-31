@extends('layouts.admin.app')

@section('section')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header clr-green text-center">
        <h1>{{$post->title}}</h1>
        <h4>Category:
          @if ($post->category)
            {{$post->category->name}}
          @endif
        </h4>
      </div>
      <div class="card-body">
        <img class="mb-3" src="{{asset($post->cover)}}" alt="{{$post->title}}">
        <div class="text-justify">
          {{$post->content}}
        </div>
        <div>
          @foreach($post->tags as $tag)
            <a href="{{route('tag.index',['slug' => $tag->slug])}}">#{{$tag->name}}</a>
          @endforeach
        </div>
        <div class="mt-3">
          <a href="{{route('admin.posts.edit',['post' => $post->id])}}" class="my-btn">Edit</a>
          <form class="d-inline-block" action="{{route('admin.posts.destroy',['post' => $post->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input class="my-btn-tr" type="submit" name="delete" value="Delete">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
