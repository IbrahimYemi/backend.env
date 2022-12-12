@extends('layouts.app')

@section('content')
    <div>
        <h1>EDIT POST</h1>
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
            {{form::label('title', 'Title')}}
            {{form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
            {{form::label('body', 'Body')}}
            {{form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body'])}}
            </div>
            <div class="form-group mt-2">
            {{form::file('cover_image')}}
            </div>
            {{form::hidden('_method', 'PUT')}}
            {{form::submit('submit', ['class' => 'btn btn-primary mt-2 px-4 py-2'])}}
        {!! Form::close() !!}
    </div>
@endsection