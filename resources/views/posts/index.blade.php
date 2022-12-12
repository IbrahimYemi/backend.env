@extends('layouts.app')

@section('content')
    <div>
        <h1>WELCOME TO BLOG</h1>
        @if(count($posts)> 0)
            @foreach($posts as $post)
            <div class="card p-4 my-2">
                <ul class="list-group-flush">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        </div>
                        <div class="col-md-8">
                            <h3>
                                <a href="/posts/{{$post->id}}">
                                    {{$post->title}}
                                </a>
                            </h3>
                            <small>Written on {{ $post->created_at }}</small>
                        </div>
                    </div>
                </ul>
            </div>
            @endforeach
        @endif
    </div>
@endsection