@extends('layouts.app')

@section('title', $category->name)

@section('content')
<!-- page banner section -->
<section class="single-banner mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="bannerside-text">
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="banner-bredcrumb">
                    <ul class="bread-crumb">
                        <li><i class="fas fa-home"></i><a href="{{ route('app.index') }}">Главная</a></li>
                        <li><a href="{{ route('app.sectors') }}">Документации</a></li>
                        <li>{{ $category->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($category->products->count())
<!-- main content view products -->
<div class="container">
    <!-- search form -->
    <form class="d-flex mb-3" role="search" method="GET" action="{{ route('app.searchProduct', $category->slug) }}">
        <input class="form-control mr-2" placeholder="Найти модель" name="search">
        <button class="btn btn-outline-success" name="searchBtn" type="submit">Найти</button>
    </form>
    <!-- product list -->

    @foreach ($category->products as $prod)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                {!! $prod->getImage() !!}
            </div>
            <div class="col-md-8">
                <!-- view product cards -->
                <div class="card-body">
                    <h5 class="card-title">{{ $prod->name }}</h5>
                    <p class="card-text">{{ $prod->description }}</p>
                    <!-- product documents -->
                    <div class="d-flex links">
                        @if ($prod->documents->count())
                            @foreach ($prod->documents as $doc)
                                @if ($doc->approved == 1)
                                    <a class="d-flex align-items-center mx-1" href="{{ asset('uploads/' . $doc->file) }}">
                                        <div style="max-width: 30px; margin-right:10px">
                                            {!! $doc->getImage() !!}
                                        </div>
                                        <span class="doc_name">{{ $doc->name }}</span>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <!-- product documents -->
                </div>
                <!-- view product cards -->
            </div>
        </div>
    </div>
    @endforeach

    <!-- form documentMain/create -->
    @if ($user)
    <div class="my-3 text-center">
        <h6>Хотите добавить свою документацию?</h6>
        <a href="{{ route('app.doc.create') }}" class="btn btn-success btn-sm">Добавить документацию</a>
    </div>
    @endif
    <!-- form documentMain/create -->
</div>
@else
<!-- main content if there is no products -->
<div class="container">
    <form class="d-flex mb-3" role="search" method="GET" action="{{ route('app.searchProduct', $category->slug) }}">
        <input class="form-control mr-2" placeholder="Найти модель" name="search">
        <button class="btn btn-outline-success" name="searchBtn" type="submit">Найти</button>
    </form>

    <h5 class="title text-danger">К сожалению нет подходящей техники</h5>

    @if ($user)
    <div class="my-3 text-center">
        <h6>Хотите добавить свою документацию?</h6>
        <a href="{{ route('app.doc.create') }}" class="btn btn-success btn-sm">Добавить документацию</a>
    </div>
    @endif
</div>
@endif

<section class="ready-section sub-section big-space">
    <div class="container">
        <div class="row">
            <!-- form report/create -->
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="short-section-content whitecolor">
                    <h3 class="title text-center mb-3">Нашли ошибку в документации?</h3>
                    <form action="{{ route('app.report.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Ваше имя</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger fs-2">{{ $message }}</->
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Ваш Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger fs-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="topic" class="form-label">Причина жалобы</label>
                            <input type="text" class="form-control" id="topic" name="topic" value="{{ old('topic') }}">
                            @error('topic')
                                <p class="text-danger fs-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Опишите пожалуйста вашу жалобу</label>
                            <textarea class="form-control" name="message" id="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-danger fs-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger">Пожаловаться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- form report/create -->
@endsection
