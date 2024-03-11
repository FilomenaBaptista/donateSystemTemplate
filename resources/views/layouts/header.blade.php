<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <h1>KuKurisa.<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="index.php#about">Quem Somos</a></li>
                <li><a class="nav-link scrollto" href="{{ route('campanhas') }}">Campanhas</a></li>
                @guest
                    <li><a class="nav-link scrollto" href="{{ route('voluntario') }}">Quero ser Voluntário</a></li>
                @endguest
                <li><a class="nav-link scrollto" href="{{ route('solicitardoacao') }}">Solicitar Doações</a></li>
                <li><a class="nav-link scrollto" href="{{ route('doar') }}"> Doar</a></li>
                <li><a class="nav-link scrollto" href="{{ route('historiasdesucesso') }}">Histórias de Sucesso</a></li>

                @if (Route::has('login'))

                    @auth
                        {{-- <li><a href="{{ url('/dashboard') }}" class="nav-link scrollto">Dashboard</a></li> --}}
                        <li><a href="{{ url('/dashboard') }}" class="nav-link scrollto">{{ Auth::user()->name }}</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">Sair</a>
                        </form>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link scrollto">Entrar</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link scrollto">Registar-se</a></li>
                        @endif
                    @endauth

                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->

        {{--  <a class="btn-getstarted scrollto" href="index.html#about">Entrar</a> --}}

    </div>
</header>
