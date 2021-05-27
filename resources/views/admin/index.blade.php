@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row mb-2">
        <div class="col-md-2">
            <div class="menu">
              <ul>
                <li><a href="{{route('admin.index')}}"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="{{route('admin.posts.index')}}"><i class="far fa-file-alt"></i>Posts</a></li>
                <li><a href="#"><i class="far fa-user"></i>Users</a></li>
                <li><a href="{{route('admin.categories.index')}}"><i class="fas fa-font"></i>Categories</a></li>
                <li><a href="#"><i class="fas fa-tag"></i>Tags</a></li>
              </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
