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
                                @foreach($tracks AS $track)
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="500ms">
                                        <div class="thumb">
                                            <a href="{{url("/music/{$category}/{$track->id}")}}"><img src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}" width="800" height="300" alt="Thumb"></a>
                                            <div class="">
                                                {{$track->title}}
                                            </div>
                                            <audio controls autoplay>
                                                <source src="{{asset("assets/audios/{$track->file_path}")}}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                                            <a href="{{url('music/rock')}}">Rock</a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/pop')}}">Pop</a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/hiphop')}}">Hip Hop</a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/classical')}}">Classical</a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/funk')}}">Funk</a>
                                        </li>
                                        <li>
                                            <a href="{{url('music/jazz')}}">Jazz</a>
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
