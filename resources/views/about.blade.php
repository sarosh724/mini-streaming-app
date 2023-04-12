@extends('template.index')

@section('page-name')
    About
@stop

@section('content')

    @include('partials.breadcrumb', ['list' => ['/' => 'home', 'about' => 'about'], 'heading' => 'about'])

    <!-- Start About
    ============================================= -->
    <div class="about-area bg-gray default-padding relative">

        <!-- Shape -->
        <div class="shape-left-top shape">
            <img src="{{asset('assets/img/shape/1.png')}}" alt="Shape">
        </div>
        <!-- End Shape -->

        <div class="container">
            <div class="row">

                <div class="col-lg-6 thumb">
                    <div class="thumb-box">
                        <img src="{{asset('assets/thumbnails/artworks-000572576414-wv5aab-t500x500.jpg')}}" alt="Thumb">
                        <div class="intro-video">
                            <div class="video">
                                <a href="https://www.youtube.com/watch?v=JZjAg6fK-BQ" class="popup-youtube relative theme video-play-button item-center">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h5>Let’s see our intro video</h5>
                                <p>
                                    If your smile is not becoming to you, then you should be coming.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 info">
                    <h5>Has been working since forever</h5>
                    <h2>A Great Place to Relax. A Great Place to <strong>Listen Music</strong>. Leading Platform.</h2>
                    <p>
                        A music web app is an online platform designed to enable users to listen to, discover, organize, and share music. The app can be accessed through a web browser or a dedicated mobile application, and it may offer a wide range of features and services, depending on its design and purpose..
                    </p>
                    <a class="btn btn-md btn-gradient" href="/"><i class="fas fa-angle-right"></i> Discover Music</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->
@stop
