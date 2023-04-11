@extends('template.index')

@section('page-name')
    Music - {{$type}}
@stop

@section('content')
    @include('partials.breadcrumb', ['list' => ['/' => 'home', 'music' => 'music', "$type" => "$type"], 'heading' => $type . ' Music'])

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-8 col-md-12">
                        <div class="blog-item-box">
                            <!-- Single Item -->
                            <div class="single-item">
                                <div class="item wow fadeInUp">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('assets/img/1500x700.png')}}" alt="Thumb"></a>
                                        <div class="post-date">
                                            12 Jul
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar wow fadeInLeft col-lg-4 col-md-12">
                        <aside>
                            <div class="sidebar-item gallery">
                                <div class="title">
                                    <h4>Gallery</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/music/pop/1')}}">
                                                <img src="{{asset('assets/img/800x800.png')}}" alt="thumb">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@stop
