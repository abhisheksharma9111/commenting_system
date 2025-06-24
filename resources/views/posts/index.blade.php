@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
    
    @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">View Post</a>
            </div>
        </div>
    @endforeach
@endsection