<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('main-title')
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @stack('styles')
</head>

@include('style.navbar')
<section class="hero  @yield('hero-class','is-success is-halfheight')">
    <div class="hero-body">
        <div class="">
            <p class="title">
                @yield('title')
            </p>
            <p class="subtitle">
                @yield('subtitle')
            </p>
            <figure class="image is-128x128">
                {{-- <img class="is-rounded" src="https://www.pexels.com/photo/girl-writing-on-a-black-keyboard-6469/"> --}}
            </figure>
        </div>
    </div>
</section>

@yield('content')
@include('style.footer')
@stack('script')
</body>

</html>
