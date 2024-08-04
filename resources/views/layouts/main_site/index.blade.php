@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-12 banner-content whitecolor">
                    <div class="banner-text">
                        <div class="flat-content">
                            <h3>Найти документацию для вашей<span> Техники</span></h3>
                            <h1 class="type-line typing">
                            <span class="type-wrap">
                                <b class="is-active">Бытовая техника</b>
                                <b>Фотоаппараты</b>
                                <b>Телефоны</b>
                                <b>Ноутбуки</b>
                                <b>Планшеты</b>
                            </span>
                            </h1>
                            <div class="banner-button">
                                <a href="{{ route('app.contacts') }}" class="main-btn">Связаться с нами</a>
                                <a href="{{ route('app.sectors') }}" class="main-btn white-btn">Документация</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // end banner section -->
    <!-- about section -->
    <section class="about-section equal-space">
        <!-- background dot -->
        <div class="dot-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                    <div class="about-txt">
                        <h2><span>О</span> Tech-city</h2>
                        <h4>«Ваши документы — наша забота!»</h4>
                        <p>Мы специализируется на поиске технической документации для различной техники. Мы являемся одним из крупнейших поставщиков технической информации в России.</p>
                        <p>Мы предоставляем широкий спектр услуг, включая поиск руководств по эксплуатации, сервисных мануалов, схем и чертежей для различных видов техники</p>
                        <a href="{{ route('app.about') }}" class="main-btn">Больше о нас</a>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="about-slider owl-carousel">
                        <img src={{ asset('assets/img/about/about-1.jpg') }} alt="about">
                        <img src={{ asset('assets/img/about/about-2.jpg') }} alt="about">
                        <img src={{ asset('assets/img/about/about-3.jpg') }} alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // end about section -->
    <!-- services section -->
    <section class="services-section equal-space grey-bg">
        <!-- background dot -->
        <div class="dot-bg left-dot "></div>
        <div class="container">
            <div class="row justify-content-center">
                <!-- heading -->
                <div class="col-12 col-lg-8 col-md-10">
                    <div class="heading">
                        <h2>Категории</h2>
                        <p>Самые популярные категории</p>
                    </div>
                </div>
            </div>
            <!-- service list -->
            <div class="row">
                <div class="col-12">
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
                </div>
            </div>
        </div>
    </section>
    <!-- // end services section -->
    <!-- feature section -->
    <section class="feature-section">
        <div class="container-fluid">
            <div class="row">
                <!-- feature content -->
                <div class="col-12 whitecolor feature-content gradent-bg equal-space">
                    <!-- single feature -->
                    <div class="single-feature wow fadeInDown" data-wow-delay="0.2s">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Быстрый поиск информации</h3>
                            <p>Благодаря большой базе данных, Tech-City может быстро найти нужную информацию для своих клиентов.</p>
                        </div>
                    </div>
                    <!-- single feature -->
                    <div class="single-feature wow fadeInDown" data-wow-delay="0.4s">
                        <div class="feature-icon">
                            <i class="fas fa-th"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Профессионализм</h3>
                            <p>Наша команда состоит из опытных специалистов, которые хорошо знают свою работу и всегда готовы помочь клиентам</p>
                        </div>
                    </div>
                    <!-- single feature -->
                    <div class="single-feature wow fadeInDown" data-wow-delay="0.6s">
                        <div class="feature-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Круглосуточная поддержка</h3>
                            <p>Эта услуга доступна для всех клиентов компании, независимо от их местоположения или времени суток.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // end feature section -->

    <!-- ready section -->
    <section class="ready-section sub-section big-space text-center">
        <div class="container">
            <div class="row">
                <!-- short section content -->
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="short-section-content whitecolor">
                        <h2>Можете добавить документацию?</h2>
                        <p>У Вас остались вопросы или заметили ошибки в в документации?</p>
                        <a href="{{ route('app.contacts') }}" class="main-btn white-btn">Свяжитесь с нами</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // end ready section -->
@endsection
