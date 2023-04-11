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
                        <img src="{{asset('assets/img/800x800.png')}}" alt="Thumb">
                        <div class="intro-video">
                            <div class="video">
                                <a href="https://www.youtube.com/watch?v=5vY-D42NFP4" class="popup-youtube relative theme video-play-button item-center">
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
                    <h5>Has been working since 2000</h5>
                    <h2>A Great Place to Work. A Great Place to <strong>Receive Care</strong>. Leading Medicine.</h2>
                    <p>
                        Pursuit chamber as elderly amongst on. Distant however warrant farther to of. My justice wishing prudent waiting in be. Who decisively attachment has dispatched. Fruit defer in party me built under first. Forbade him but savings sending ham general.
                    </p>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#">Online Appoinment</a></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-drugs"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#">Health Queries</a></h5>
                            </div>
                        </li>
                    </ul>
                    <a class="btn btn-md btn-gradient" href="#"><i class="fas fa-angle-right"></i> Make Appoinment</a>
                </div>

            </div>
        </div>
    </div>
    <!-- End About -->
@stop
