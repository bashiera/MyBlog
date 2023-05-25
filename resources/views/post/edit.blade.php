@extends('layout.layout')
@section('main-title', 'Edit Post Page')
@section('title', 'Edit' .' '.  $post->title)
@section('subtitle', 'Edit Post Information')
{{-- ---------------------- --}}
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT');
                <div class="field">
                    <label class="label">title</label>
                    <div class="control">
                        <input class="input" type="text" name="title" value="{{ $post->title }}">
                    </div>
                    @error('title')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">author_name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-success" type="text"name="author_name" value="{{ $post->author_name }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                        @error('author_name')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <p class="help is-success">This username is available</p> --}}
                </div>
                <div class="field">
                    <label class="label">author_image</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="text" name="author_image" value="{{ $post->author_image }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        @error('author_image')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label"> Post image</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-danger" type="text" name="image" value="{{ $post->image }}">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            @error('image')
                                <div class="help is-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <p class="help is-danger">This email is invalid</p> --}}
                    </div>
                    <div class="field">
                        <label class="label">Post information</label>
                        <div class="control">
                            <textarea class="textarea" name="content"> {{ $post->content }}</textarea>
                            @error('content')
                                <div class="help is-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="label"> Selecte Category </label>
                            <div class="select is-rounded">
                                <div class="select @error('category_id')is-danger @enderror">
                                    <select name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('category_id')
                                            <div class="help is-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="label">Choose Tags</label>
                            {{-- <div class="select "> --}}
                            <div class="select is-multiple @error('tags')is-danger @enderror">
                                <select name="tags[]" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('tag')
                                        <div class="help is-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
@endsection
