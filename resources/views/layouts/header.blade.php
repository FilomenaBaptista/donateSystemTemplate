<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{ route('campanha.home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="{{ asset('assets/img/logo.png') }}" alt="KuKurisa">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="{{ route('campanha.index') }}"><span>Campanhas</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @can('REGISTAR CAMPANHA')
                            <li><a class="nav-link scrollto" href="{{ route('campanha.create') }}">Criar uma Campanha</a>
                            </li>
                        @endcan

                    </ul>
                </li>
                @guest
                    <li><a class="nav-link scrollto" href="{{ route('voluntario') }}">Seja um Voluntário</a></li>
                @endguest

                @can('REGISTAR CAMPANHA')
                    <li class="dropdown"><a href="{{ route('doacao.index') }}"><span>Doações</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ route('doar.create') }}">Doação por Bens Materiais </a></li>
                            <li><a href="{{ route('shop') }}">Doar pela loja</a></li>
                        </ul>
                    </li>
                @endcan

                <li><a class="nav-link scrollto"
                    href="{{ route('historiasdesucesso', ['estado' => 'Concluido']) }}">Histórias de Sucesso</a>
                </li>

                @if (Route::has('login'))

                    @auth
                    <li class="dropdown"> 
                        <a  class="nav-link scrollto lik-user">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1)) }}
                           
                        </a>
                    <ul class="ul-user">

                        <li><a href="{{route('userperfil', ['id' => Auth::id()])  }}"
                            class="nav-link scrollto">{{ Auth::user()->name }}
                            </a> 
                        </li>
                           
                        <li><a href="{{ route('doacao.minhasDoacoes') }}">Doações Feitas</a></li>
                        <li><a href="{{ route('user.index') }}">Gerir Usuarios</a></li>
                      
                        <li><a href="{{ route('campanha.minhasCampanhas') }}">Minhas Campanhas</a></li>
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
