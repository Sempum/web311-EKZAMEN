<nav class="navbar navbar-expand-lg w-100">
    <!-- brand / logo -->
    <a class="navbar-brand" href="{{ route('app.index') }}">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Wroot">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <!-- nav menu -->
        <div id="navbarNavDropdown" class="navbar-collapse collapse justify-content-end mainmenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.index') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.about') }}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.sectors') }}">Найти документацию</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.contacts') }}">Связаться с нами</a>
                </li>

                @if ($user)
                <div class="d-flex align-items-center justify-content-center mx-3">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm" style="margin-right: 5px">Выйти</button>
                    </form>
                    @hasanyrole('admin|moderator')
                        <a class="btn btn-info btn-sm" href="{{ route('admin.dashboard') }}">Перейти в админ панель</a>
                    @endhasanyrole
                </div>
                @else
                <div class="d-flex align-items-center justify-content-center mx-3">
                    <a href="{{ route('auth.loginIndex') }}" class="btn btn-sm color-bg text-light" style="margin-right: 5px">Войти</a>
                    <a href="{{ route('auth.registerIndex') }}" class="btn btn-warning btn-sm ">Зарегистрироваться</a>
                </div>
                @endif
            </ul>

        </div>
</nav>
