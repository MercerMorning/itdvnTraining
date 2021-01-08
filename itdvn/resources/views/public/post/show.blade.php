@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->body }}</h2>
    </div>
@endsection