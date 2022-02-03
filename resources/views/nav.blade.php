<nav class="navbar is-fixed-top is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-menu">
        <div class="navbar-start">
         <div class="navbar-item">
                <div class="buttons">
                    @auth
                        <a class="button is-light" href="{{ route("home") }}">Naslovna</a>
                        <a class="button is-light" href="{{ route("getContact") }}">Kontakt</a>

                        @if (auth()->user() && auth()->user()->role >= 1)
                            <a class="button is-light" href="{{ route("getAllTickets") }}">Tiketi</a>
                        @endif

                        {{-- @if (auth()->user() && auth()->user()->role >= 2)
                            <a class="button is-light" href="{{ route("allUsers") }}">Korisnici</a>
                        @endif --}}
                    @endauth

                </div>
            </div>


         </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @guest
                    @if (Route::has('login'))
                            <a class="button is-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="button is-info" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                    @endif
                    @else
                        <a class="button is-info" href="{{ route('getGetProfile', auth()->user()->id) }}">Profil</a>

                        <a class="button is-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>

    </div>
</nav>
