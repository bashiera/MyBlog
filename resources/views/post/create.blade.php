@extends('layout.layout')
@section('main-title', 'Create Post Page')
@section('title', 'Create Post')
@section('subtitle', 'Add Your Post Here')
{{-- ---------------------------------------------------- --}}
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                New Post
            </h1>
            {{-- <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> --}}
            <form action="/posts" method="POST">
                @csrf
                <div class="field">
                    <label class="label">title</label>
                    <div class="control">
                        <input class="input" type="text" name="title"value="{{ old('title') }}">
                        @error('title')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">author_name</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text"name="author_name"value="{{ old('author_name') }}">
                        <span class="icon
                                is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                        @error('author_name')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <p class="help">This username is available</p> --}}
                </div>
                <div class="field">
                    <label class="label">author_image</label>
                    <div class="file is-info has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                               upload image
                                </span>
                        </label>
                    </div>
                        @error('author_image')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label"> Post image</label>
                        <div class="file is-info has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                   upload image
                                    </span>
                            </label>
                        </div>
                        @error('image')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Post information</label>
                        <div class="control">
                            <textarea class="textarea" name="content">{{ old('content') }}</textarea>
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
                                                {{ $category->id == old('category_id') ? 'selected' : ' ' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        @error('category_id')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ----------- --}}
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
                                    <label class="label"></label>
                                    <div class="control">
                                        <button class="button is-link">Submit</button>
                                    </div>
                                    <div class="control">
                                        <button class="button is-link is-light">Cancel</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>
    </section>
    <style>
        .hero.is-success.is-halfheight {
            background-color: rgb(18, 169, 174)
        }
    </style>
@endsection
