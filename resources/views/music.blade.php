@extends('template.index')

@section('page-name')
    Music
@stop

@section('content')
    @include('partials.breadcrumb', ['list' => ['/' => 'home', 'music' => 'music'], 'heading' => 'music'])

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-8 col-md-12">
                        <div class="blog-item-box">
                            <div class="row">
                                <!-- Single Item -->
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="500ms">
                                        <div class="thumb">
                                            <a href="{{url('/music/pop/1')}}"><img src="{{asset('assets/img/800x600.png')}}" alt="Thumb"></a>
                                            <div class="post-date">
                                                12 Jul
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="600ms">
                                        <div class="thumb">
                                            <a href="{{url('/music/pop/1')}}"><img src="{{asset('assets/img/800x600.png')}}" alt="Thumb"></a>
                                            <div class="post-date">
                                                15 Aug
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="700ms">
                                        <div class="thumb">
                                            <a href="{{url('/music/pop/1')}}"><img src="{{asset('assets/img/800x600.png')}}" alt="Thumb"></a>
                                            <div class="post-date">
                                                05 Nov
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="800ms">
                                        <div class="thumb">
                                            <a href="{{url('/music/pop/1')}}"><img src="{{asset('assets/img/800x600.png')}}" alt="Thumb"></a>
                                            <div class="post-date">
                                                12 Jul
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar wow fadeInLeft col-lg-4 col-md-12">
                        <aside>
                            <div class="sidebar-item search">
                                <div class="title">
                                    <h4>Search</h4>
                                </div>
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" name="text" class="form-control">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>category list</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="{{url('music/rock')}}">Rock <span>69</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/pop')}}">Pop <span>25</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/hiphop')}}">Hip Hop <span>18</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/classical')}}">Classical <span>37</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/funk')}}">Funk <span>12</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/jazz')}}">Jazz <span>12</span></a>
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
