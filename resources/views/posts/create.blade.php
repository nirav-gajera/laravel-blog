@extends('layouts.app')

@section('content')

    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Create new post</h4>
            <div class="card-text">
                @include('posts.partials.create_post')
            </div>
        </div>
    </div>

@endsection
