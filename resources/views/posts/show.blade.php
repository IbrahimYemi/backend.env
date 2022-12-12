@extends('layouts.app')

@section('content')
    <div>
        <h1>WELCOME TO BLOG</h1>
        <h2> {{ $post->title }} </h2>
        <p>  {{ $post->body }} </p>
        <img style="width: 100%; height:auto;" src="/storage/cover_images/{{$post->cover_image}}" alt="">
        <hr>
        <small> Written on {{$post->created_at}} </small><br>
        @if (!Auth::guest())
            @if (Auth::user()->id === $post->user_id)
                <div class="flex flex-direction-row mt-2">
                    <a href="/posts/{{$post->id}}/edit" class="back btn btn-warning"> <- Edit post -> </a>
                    {{-- <form action="/posts/{{$post->id}}" method="POST" class="back btn btn-danger" >
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="<- Delete post ->"  class="bg-transparent border-0" >
                    </form> --}}
                    
                        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right  btn btn-danger']) !!}   
                            {{form::hidden('_method', 'DELETE')}}
                            {{form::submit('Delete', ['class'=>'bg-transparent border-0'])}}
                        {!!form::close() !!}
                
                </div>
            @endif
        @endif
        <hr>
        <a href="{{ route('posts.index') }}" class="back btn btn-primary"> <- back to all posts -> </a>
    </div>
@endsection