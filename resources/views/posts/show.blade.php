@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{ $post->title }}</h1>
    <img src="/storage/cover_image/{{ $post->cover_image }}" style="width: 100%" alt="">
    <br>
    <br>
    <div>
        {{-- We use {!!  !!} to parse HTML properties (bold text, italic...) which will otherwise be ignored --}}
        {!! $post->body  !!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{ $post->user->name }}</small>
    <hr>
    {{-- IF user is not a guest he can see this --}}
    @if(!Auth::guest())
        {{-- Doesn't let user change blog that is not his --}}
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection