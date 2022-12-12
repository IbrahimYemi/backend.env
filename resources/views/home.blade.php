@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="btn btn-warning">
                        <a href="{{ route('posts.create') }}" class="text-decoration-none text-white">Create new Post</a>
                    </div>
                    <div class="btn btn-success">
                        <a href="{{ route('posts.index') }}" class="text-decoration-none text-white">All Posts</a>
                    </div>
                    <h1>Your Blog Posts</h1>
                    @if(count($posts) > 0)
                    {{-- @if(!empty($posts)) --}}
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post )
                            <tr>
                                <th>
                                    <a href="/posts/{{$post->id}}">
                                        {{$post->title}}
                                    </a>
                                </th>
                                <th>
                                    <a href="/posts/{{$post->id}}/edit" class="back btn btn-warning"> Edit </a>
                                </th>
                                <th>
                                    <form action="/posts/{{$post->id}}" method="POST" class="back btn btn-danger" >
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"  class="bg-transparent border-0" >
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
