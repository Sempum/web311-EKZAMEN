<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Админ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        @hasanyrole('admin|moderator')
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Продукты
                        </a>
                        <ul class="dropdown-menu">
                            @can('manage sectors')
                                <li><a class="dropdown-item" href="{{ route('sector.index') }}">Категории</a></li>
                            @endcan
                            @can('manage categories')
                                <li><a class="dropdown-item" href="{{ route('category.index') }}">Подкатегории</a></li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            @can('manage products')
                                <li><a class="dropdown-item" href="{{ route('products.index') }}">Продукты</a></li>
                            @endcan
                            @can('manage documents')
                                <li><a class="dropdown-item" href="{{ route('documents.index') }}">Документация</a></li>
                            @endcan
                        </ul>
                        @endhasanyrole
                    </li>
                    @hasrole('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Пользователи
                        </a>
                        <ul class="dropdown-menu">
                            @can('manage roles')
                            <li><a class="dropdown-item" href="{{ route('roles.index') }}">Роли</a></li>
                            @endcan
                            @can('manage permissions')
                            <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Права</a></li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            @can('manage users')
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Пользователи</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endhasrole
                </ul>
            <form class="d-flex" role="search">
                <a href="{{ route('app.index') }}" class="btn btn-primary">Вернуться на сайт</a>
            </form>
            </div>
        </div>
    </nav>

    <main class="my-3">
        <div class="container">
            @yield('content')
        </div>
    </main>


    <script src="{{ asset('admin-assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('page-script')
</body>
</html>
