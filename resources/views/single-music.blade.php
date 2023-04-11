@extends('template.index')

@section('page-name')
    Music - {{$category}}
@stop

@section('content')
    @include('partials.breadcrumb', ['list' => ['/' => 'home', 'music' => 'music', "$category" => "$category"], 'heading' => $category . ' Music'])

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
                                        <a href="#"><img src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}" alt="Thumb"></a>
                                        <div class="">
                                            {{$track->title}}
                                        </div>
                                        <audio controls autoplay>
                                            <source src="{{asset("assets/audios/{$track->file_path}")}}" type="audio/mpeg">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            @include('commentsDisplay', ['comments' => $track->comments, 'track_id' => $track->id])
                            <hr/>
                            <h4>Add comment</h4>
                            <form method="post" action="{{route('comments.store')}}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="track_id" value="{{ $track->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
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
