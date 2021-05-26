@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center mb-2">
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
    <a href="{{route('admin.posts.index')}}" class="clr-green text-uppercase">Posts</a>
</div>
@endsection
