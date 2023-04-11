@extends('template.index')

@section('page-name')
    {{@$category}} Music
@stop

@section('content')
    @include('partials.breadcrumb', ['list' => ['/' => 'home', "$category" => $category . ' Music'], 'heading' => $category . ' Music'])

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
                                @if(count($tracks))
                                @foreach($tracks AS $track)
                                <div class="col-lg-6 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="500ms">
                                        <div class="thumb bg-primary rounded shadow" style="position:relative;">
                                            <a href="{{url("/music/{$category}/{$track->id}")}}">
                                                @if($track->thumbnail_path)
                                                <img src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}"
                                                     width="100%" height="280px" alt="{{$track->title}}"
                                                     style="object-fit: cover; object-position: center;">
                                                @else
                                                    <img src="{{asset("assets/img/default-music.png")}}"
                                                         width="100%" height="280px" alt="{{$track->title}}"
                                                         style="object-fit: cover; object-position: center;">
                                                @endif
                                            </a>
                                            <div class="my-overlay rounded fadeInUp">
                                                <span>
                                                    <a href="{{url("/music/{$category}/{$track->id}")}}" class="text-light">
                                                        <i class="fa fa-play-circle fa-lg"  style="font-size: 4.5rem;"></i>
                                                    </a>
                                                </span>
                                            </div>
{{--                                            <div class="">--}}
{{--                                                {{$track->title}}--}}
{{--                                            </div>--}}
{{--                                            <audio controls autoplay>--}}
{{--                                                <source src="{{asset("assets/audios/{$track->file_path}")}}" type="audio/mpeg">--}}
{{--                                            </audio>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <span class="bg-light-gradient">No Track Found</span>
                                @endif
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
                                    <form type="get" action="{{url("music/{$category}")}}">
                                        <input type="text" name="search" autocomplete="on" value="{{@$search}}" class="form-control">
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
                                            <a href="{{url('music/classic')}}">Classical</a>
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
