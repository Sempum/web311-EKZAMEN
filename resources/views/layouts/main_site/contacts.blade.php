@extends('layouts.app')

@section('title', 'О нас')

@section('content')
<!-- page banner section -->
	<!-- page banner section -->
    <section class="page-banner contact-banner">
        <div class="container">
            <div class="row">
                <div class="page-banner-text whitecolor text-center">
                    <h1>Связаться с нами</h1>
                    <p>Если у Вас остались вопросы или вы нашли ошибку в документации свяжитесь с нами</p>
                </div>
                <!-- page banner bottom -->
                <div class="page-banner-bottom color-bg">
                    <ul class="bread-crumb">
                        <li><i class="fas fa-home"></i><a href="{{ route('app.index') }}">Главная</a></li>
                        <li>Связаться с нами</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- // end page banner section -->
    <!-- google map section -->
    <div class="map-section top-space">
        <div class="map" id="map"></div>
    </div>
    <!-- // end google map section -->
    <!-- contact us section -->
    <section class="contact-section grey-bg">
        <div class="container">
            <div class="contact-box">
                <div class="row justify-content-center">
                    <!-- heading -->
                    <div class="col-12 col-lg-8 col-md-10">
                        <div class="heading">
                            <h2>Связаться<span> с нам</span></h2>
                            <p>Если у Вас остались вопросы или Вы нашли ошибку в документации.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- contact form -->
                    <div class="col-12 col-lg-8">
                        <div class="contact-form mr-lg-4">
                            <form action="{{ route('app.report.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Ваше имя" value="{{ old('name') }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Ваш Email" value="{{ old('email') }}">
                                        @error('email')
                                        <small class="text-danger mb-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="topic" name="topic" placeholder="Тема обращения" value="{{ old('topic') }}">
                                        @error('topic')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="message" id="message" placeholder="Напишите Ваше сообщение">{{ old('message') }}</textarea>
                                        @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn" type="submit" id="mt-btn">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact address -->
                    <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                        <div class="contact-info">
                            <h3>Наши контакты</h3>
                            <p>Остались вопросы?</p>
                            <!-- single contact -->
                            <div class="single-contact">
                                <div class="contact-line">
                                    <i class="fas fa-envelope"></i>
                                    <h4>Email Адрес</h4>
                                </div>
                                <span>ryslan.nigmatyllin2001@mail.ru</span>
                            </div>
                            <!-- single contact -->
                            <div class="single-contact">
                                <div class="contact-line">
                                    <i class="fas fa-phone"></i>
                                    <h4>Номер телефона</h4>
                                </div>
                                <span>+7 (900) 329-31-16</span>
                            </div>
                            <!-- single contact -->
                            <div class="single-contact">
                                <div class="contact-line">
                                    <i class="fas fa-map"></i>
                                    <h4>Наше местоположение</h4>
                                </div>
                                <span>ул. Профессора Камая</span>
                                <span>Россия, г. Казань, 420101</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // end contact us section -->

		<!-- google map script-->
		<script>
            function initMap() {
            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(
            [{"elementType": "geometry", "stylers": [{"color": "#ebe3cd"}]},{"elementType": "labels.text.fill", "stylers": [{"color": "#523735"}]},{"elementType": "labels.text.stroke", "stylers": [{"color": "#f5f1e6"}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#c9b2a6"}]},{"featureType": "administrative.land_parcel", "elementType": "geometry.stroke", "stylers": [{"color": "#dcd2be"}]},{"featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{"color": "#ae9e90"}]},{"featureType": "landscape.natural", "elementType": "geometry", "stylers": [{"color": "#dfd2ae"}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#dfd2ae"}]},{"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"color": "#93817c"}]},{"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{"color": "#a5b076"}]},{"featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{"color": "#447530"}]},{"featureType": "road", "elementType": "geometry", "stylers": [{"color": "#f5f1e6"}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#fdfcf8"}]},{"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#f8c967"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#e9bc62"}]},{"featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [{"color": "#e98d58"}]},{"featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{"color": "#db8555"}]},{"featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{"color": "#806b63"}]},{"featureType": "transit.line", "elementType": "geometry", "stylers": [{"color": "#dfd2ae"}]},{"featureType": "transit.line", "elementType": "labels.text.fill", "stylers": [{"color": "#8f7d77"}]},{"featureType": "transit.line", "elementType": "labels.text.stroke", "stylers": [{"color": "#ebe3cd"}]},{"featureType": "transit.station", "elementType": "geometry", "stylers": [{"color": "#dfd2ae"}]},{"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#b9d3c2"}]},{"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#92998d"}]}],
            {
            name: 'Styled Map'
            });
            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var map = new google.maps.Map(document.getElementById('map'), {
            center: {
            lat: 40.754528,
            lng: -73.355328
            },
            zoom: 12,
            mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
            'styled_map'
            ]
            }
            });
            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
            }
            </script>
            <!-- // end google map script-->
            <!-- Google Map Api -->
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAca3b0RoKoA24F9-WfAcnQ4WhazI3bw-I&callback=initMap">
            </script>
@endsection
