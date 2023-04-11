@extends('template.index')

@section('page-name')
    {{$category}} Music
@stop

@section('content')
    @include('partials.breadcrumb', ['list' => ['/' => 'home', "music/$category" => $category . ' Music', 'title' => $track->title], 'heading' => $track->title])

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
                                    <div class="thumb border shadow-sm">
                                        @if($track->type == 'video')
                                            @if($track->thumbnail_path)
                                                <video width="100%" height="450px" controls>
                                                    <source src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}">
                                                </video>
                                                <div class="p-2 mt-2 info">
                                                    <h4 class="text-capitalize" style="color: #1ebeb6;">{{$track->title}}</h4>
                                                </div>
                                            @endif
                                        @endif

                                        @if($track->type == 'audio')
                                            <a href="javascript:void(0);" class="rounded shadow">
                                                @if($track->thumbnail_path)
                                                    <img src="{{asset("assets/thumbnails/{$track->thumbnail_path}")}}"
                                                         width="100%" height="450px" alt="{{$track->title}}"
                                                         style="object-fit: cover; object-position: center;"
                                                         class="rounded shadow">
                                                @else
                                                    <img src="{{asset("assets/img/default-music.png")}}"
                                                         width="100%" height="450px" alt="{{$track->title}}"
                                                         style="object-fit: cover; object-position: center;"
                                                         class="rounded shadow">
                                                @endif
                                            </a>
                                            <div class="p-2 mt-2 info">
                                                <h4 class="text-capitalize" style="color: #1ebeb6;">{{$track->title}}</h4>
                                            </div>
                                            <audio controls autoplay style="width: 100%;">
                                                <source src="{{asset("assets/audios/{$track->file_path}")}}" type="audio/mpeg">
                                            </audio>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @include('commentsDisplay', ['comments' => $track->comments, 'track_id' => $track->id])
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0">Add comment</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{route('comments.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control" name="body" placeholder="write comment here..........."></textarea>
                                            <input type="hidden" name="track_id" value="{{ $track->id }}" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-sm btn-success" value="Add Comment" />
                                        </div>
                                    </form>
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
