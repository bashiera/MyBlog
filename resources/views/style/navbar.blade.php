<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                {{-- <a class="navbar-item" href="https://bulma.io"> --}}
                {{-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> --}}
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="/">
                        Home
                    </a>
                    <a class="navbar-item" href="/contact">
                        contact us
                    </a>
                    {{-- <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">

                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                About
                            </a>
                            <a class="navbar-item">
                                Jobs
                            </a>
                            <a class="navbar-item">
                                Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            @guest
                                <a class="button is-light" href="{{ route('login') }}">
                                    <b> LogIn</b>
                                </a>
                            @endguest
                            @auth
                            <div class="navbar-item"> Hello {{ Auth::user()->name }} </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="button is-danger">
                                        Logout
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
<style>
    .hero.is-success.is-halfheight {
        background-color: rgb(11, 150, 127)
    }
</style>
