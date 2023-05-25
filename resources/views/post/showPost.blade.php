@extends('layout.layout')
@section('main-title', $post->title)
@section('title', $post->category->name)
{{-- @section('subtitle', $post->tag->name) --}}
@section('content')
    <section class="section">
        <div class="container">
            <div class="image"><img src={{ $post->image }} alt={{ $post->title }}></div>
            <div class="content">
                {{ $post['content'] }}
                <br>
                <time datetime="2016-1-1">{{ $post['created_at'] }}</time>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag) }}" class="tag is-danger is-light">{{ $tag->name }}</a>
                @endforeach

                <form action={{ route('posts.destroy', $post) }} method="POST">
                    @csrf
                    @method('delete')
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-danger">delete</button>
                        </div>
                    </div>
                </form>
                <div>
                    <a class="button is-primary" href={{ route('posts.edit', $post) }}> Edit Your Post </a>
                </div>
            </div>
        </div>
    </section>
@endsection
