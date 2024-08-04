@extends('layouts.app')

@section('title', 'О нас')

@section('content')
<!-- page banner section -->
<section class="page-banner about-banner">
    <div class="container">
        <div class="row">
            <div class="page-banner-text whitecolor text-center">
                <h1>О нас</h1>
                <p>Наша компания играет важную роль в сфере технического обслуживания и ремонта оборудования, предоставляя своим клиентам необходимую информацию для эффективной работы и эксплуатации своего оборудования</p>
            </div>
            <!-- page banner bottom -->
            <div class="page-banner-bottom color-bg">
                <ul class="bread-crumb">
                    <li><i class="fas fa-home"></i><a href="{{ route('app.index') }}">Главная</a></li>
                    <li>О нас</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- // end page banner section -->
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
<!-- about more section -->
<section class="more-about-section">
    <div class="container-fluid black-bg more-about-area">
        <div class="row">
            <div class="container">
                <div class="row more-about-container">
                    <div class="col-12 col-lg-3">
                        <div class="single-count">
                            <h3>>3000</h3>
                            <span>Загруженной документации</span>
                        </div>
                        <div class="single-count">
                            <h3>>10000</h3>
                            <span>Довольных клиентов</span>
                        </div>
                        <div class="single-count">
                            <h3>12</h3>
                            <span>Лет на рынке</span>
                        </div>
                        <div class="single-count">
                            <h3>>100</h3>
                            <span>Видов техники</span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 more-about-box">
                        <div class="more-about-tabs">
                            <!-- tab content -->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-first" role="tabpanel" aria-labelledby="nav-first-tab">
                                    <!-- single tab pane -->
                                    <div class="single-more-tab">
                                        <h2>Широкий спектр услуг</h2>
                                        <p>Мы предоставляет разнообразные услуги, связанные с поиском технической документации для различных видов техники.</p>
                                    </div>
                                </div>
                                <!-- single tab pane -->
                                <div class="tab-pane fade" id="nav-second" role="tabpanel" aria-labelledby="nav-second-tab">
                                    <div class="single-more-tab">
                                        <h2>Большая база данных</h2>
                                        <p>Мы имеем обширную базу данных технической документации, которая постоянно обновляется и расширяется.</p>
                                    </div>
                                </div>
                                <!-- single tab pane -->
                                <div class="tab-pane fade" id="nav-third" role="tabpanel" aria-labelledby="nav-third-tab">
                                    <div class="single-more-tab">
                                        <h2>Удобство</h2>
                                        <p>Мы предлагаем удобный онлайн-сервис, который позволяет клиентам быстро получить нужную информацию без необходимости посещения офиса.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- nav tabs -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <!-- single nav link -->
                                    <a class="nav-item nav-link active" id="nav-first-tab" data-toggle="tab"  role="tab" aria-controls="nav-first" aria-selected="true">
                                        <div class="box-image">
                                            <img src={{ asset("assets/img/about-tab-1.jpg") }} alt="">
                                        </div>
                                    </a>
                                    <!-- single nav link -->
                                    <a class="nav-item nav-link" id="nav-second-tab" data-toggle="tab"  role="tab" aria-controls="nav-second" aria-selected="false">
                                        <div class="box-image">
                                            <img src={{ asset("assets/img/about-tab-2.jpg") }} alt="">
                                        </div>
                                    </a>
                                    <!-- single nav link -->
                                    <a class="nav-item nav-link" id="nav-third-tab" data-toggle="tab"  role="tab" aria-controls="nav-third" aria-selected="false">
                                        <div class="box-image">
                                            <img src={{ asset("assets/img/about-tab-3.jpg") }} alt="">
                                        </div>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // end about more section -->
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
@endsection
