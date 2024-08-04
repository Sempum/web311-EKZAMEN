@extends('layouts.app')

@section('title', 'Документация')

@section('content')
<section class="page-banner blog-banner">
    <div class="container">
        <div class="row">
            <div class="page-banner-text whitecolor text-center">
                <h1>Документация</h1>
                <p>Здесь вы сможете найти интересующую Вас документацию</p>
            </div>
            <!-- page banner bottom -->
            <div class="page-banner-bottom color-bg">
                <ul class="bread-crumb">
                    <li><i class="fas fa-home"></i><a href="{{ route('app.index') }}">Главная</a></li>
                    <li>Документации</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- // end page banner section -->
<!-- main blog section -->
<div class="main-blog-section equal-space">
    <div class="container">
        <h1 class="title mb-3">Подкатегория</h1>
        <div class="row">
            <!-- main content view categories -->
            <main class="col-12 col-lg-8">
                <div class="mr-lg-4">
                    <div class="row">
                        <div class="col-12">
                            @if ($categories->count())
                            <div class="service-list row">
                                @foreach ($categories as $cat)
                                    <div class="col-12 col-xl-4 col-md-6">
                                        <a class="single-service" href="{{ route('app.categoryBySlug', $cat->slug) }}">
                                            <i class="fas cat-img">
                                                {!! $cat->getImage() !!}
                                            </i>
                                            <h3>{{ $cat->name }}</h3>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            @else
                            <h5 class="my-5">К сожалению нет доступной подкатегории</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
            <!-- right sidebar -->
            <aside class="col-12 col-lg-4">
                <div class="right-sidebar">
                    <!-- search sidebar -->
                    <div class="single-sidebar">
                        <form class="search-box" method="GET" action="{{ route('app.searchCategory') }}">
                            <input type="search" name="search" placeholder="Введите искомую подкатегорию...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <!-- single sidebar -->
                    <div class="single-sidebar">
                        <h3>Категория</h3>
                        <ul class="cat-list">
                            @foreach ($sectors as $sector)
                                <li><a href="{{ route('app.sectorBySlug', $sector->slug) }}">{{ $sector->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
