@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    </div>

    <h3>Comments</h3>
    @include('comments._form', ['post' => $post])
    
    <div class="mt-4">
        @foreach($post->comments as $comment)
            @include('comments._comment', ['comment' => $comment])
        @endforeach
    </div>
@endsection