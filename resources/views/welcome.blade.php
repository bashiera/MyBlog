@extends('layout.layout')
@section('main-title', 'Home Page')
@section('title', 'Home Page')
@section('subtitle', 'Welcome')
{{-- ---------------------- --}}
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                Hello World
            </h1>
            <p class="subtitle">
                <strong><i> This is my first website</i></strong>
            </p><br><br>
        </div>
        <div class="columns is-multiline ">
            @foreach ($posts as $post)
                <div class="column is-4">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src={{ $post['image'] }} alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src={{ $post['author_image'] }} alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4"><a href="{{ route('posts.showPost', $post) }}">
                                            {{ $post['title'] }}</a>
                                    </p>
                                    <p class="subtitle is-6">{{ $post['author_name'] }}</p>
                                </div>
                            </div>
                            <div class="content">
                                {{ $post['content'] }}
                                <br>
                                <time datetime="2016-1-1">{{ $post['created_at'] }}</time>
                                <br>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('tags.show', $tag) }}"
                                        class="tag is-danger is-light">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <style>
        .hero.is-success.is-halfheight {
            background-color: rgb(19, 110, 95)
        }
    </style>
@endsection
