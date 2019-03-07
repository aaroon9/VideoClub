<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">blockbuster</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        @if(Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            Catálogo
                        </a>
                    </li>

                    <!-- ################################################################### -->
                    <!-- Esto deberia ser solo visible para el admin o no visible para nadie -->
                    <!-- ################################################################### -->
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}"  style="visibility: hidden">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <span>&10010</span> Nueva película
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <input class="form-control navbar-search w-100" type="text" placeholder="Search" aria-label="Search">
                    </li>
                    <!-- <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li> -->
                    <li class="nav-item navbar-userIcon">
                        <!-- Esto debe de ir al panel de usuario directamente -->
                        <a class="nav-link" href="{{url('/user/{id}')}}">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <!-- Esto es un dropdown con la opcioni panel, y cerrar sesion -->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- Aqui deberia mostrar el nombre del user -->
                            {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/mysite">Mis peliculas</a>
                            <a class="dropdown-item" href="#">Mis facturas</a>
                            <form action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="dropdown-item">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/user/{id}/cart')}}">
                            <i class="fas fa-shopping-cart"> {{{ isset(Cart::count()) ? Cart::count() : '0' }}}</i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
