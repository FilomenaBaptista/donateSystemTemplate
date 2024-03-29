<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="{{asset('assets/img/logo.png')}}" alt="KuKurisa">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('campanha.index') }}">Campanhas</a></li>
                @guest
                    <li><a class="nav-link scrollto" href="{{ route('voluntario') }}">Voluntário</a></li>
                @endguest

                @can('REGISTAR CAMPANHA')
                    <li><a class="nav-link scrollto" href="{{ route('campanha.create') }}">Solicitar Doações</a></li>
                @endcan
                @can('REGISTAR CAMPANHA')
                <li class="dropdown"><a href="{{ route('doacao.index') }}"><span>Doações</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                    <li><a href="{{route('doar.create')}}">Doação por Bens Materiais </a></li>
                    <li><a href="{{route('doarmoney')}}">Doação Monetária</a></li>
                    <li><a href="{{route('doarloja')}}">Doar pela loja</a></li>
                    </ul>
                </li>
                @endcan

                <li><a class="nav-link scrollto" href="{{ route('historiasdesucesso') }}">Histórias de Sucesso</a></li>

                @if (Route::has('login'))

                    @auth
                        {{-- <li><a href="{{ url('/dashboard') }}" class="nav-link scrollto">Dashboard</a></li> --}}
                         <li class="dropdown"><a href="{{ url('/dashboard') }}"
                                class="nav-link scrollto">{{ Auth::user()->name }}</a>
                            <ul>
                                <li><a href="">Doações Feitas</a></li>
                                <li><a href="">Editar de Perfil</a></li>
                                <li><a href="">Minhas Campanhas</a></li>
                                <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">Sair</a>
                                        </form>
                                   </li>
                            </ul>
                        </li>

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
