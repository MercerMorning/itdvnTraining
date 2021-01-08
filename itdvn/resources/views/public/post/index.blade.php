@extends('layouts.app')

@section('content')
    <div class="container">
@include('partial.success')
        <a href="{{ route('post.create') }}">Create</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            @if(count($posts))
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->published)
                                <p>published</p>
                            @else
                                <p>not published</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}">edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('post.destroy', ['id' => $post->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection