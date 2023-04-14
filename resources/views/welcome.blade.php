@extends('template.index')

@section('page-name')
    Home
@stop

@section('content')
    @include('sections.banners')
    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div>
                <h2 class="m-0 mb-5 text-center font-weight-bold" id="music-box">Enjoy the moments of life</h2>
            </div>
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-12 col-md-12">
                        <div class="blog-item-box">
                            <div class="row">
                                <!-- Single Item -->
                                @foreach($tracks AS $track)
                                    <div class="col-lg-4 col-md-4 single-item">
                                        <div class="item wow fadeInUp" data-wow-delay="500ms">
                                            <div class="thumb bg-primary rounded shadow" style="position:relative;">
                                                <a href="{{url("/music/{$track->music_category_id}/{$track->id}")}}">
                                                    @if($track->thumbnail_path)
                                                        <img src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}"
                                                             width="100%" height="300px" alt="{{$track->title}}"
                                                             style="object-fit: cover; object-position: center;">
                                                    @else
                                                        <img src="{{asset("assets/img/default-music.png")}}"
                                                             width="100%" height="300px" alt="{{$track->title}}"
                                                             style="object-fit: cover; object-position: center;">
                                                    @endif
                                                </a>
                                                <div class="my-overlay rounded fadeInUp">
                                                <span>
                                                    <a href="{{url("/music/{$track->music_category_id}/{$track->id}")}}" class="text-light">
                                                        <i class="fa fa-play-circle fa-lg"  style="font-size: 4.5rem;"></i>
                                                    </a>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <!-- End Single Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@stop
