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
                                    <div class="thumb border shadow-sm p-0">
                                        @if($track->type == 'video')
                                            @if($track->file_path)
                                                <video width="100%" height="450px" controls>
                                                    <source src="{{asset("assets/videos/{$track->file_path}")}}" type="video/mp4">
                                                    <source src="{{asset("assets/videos/{$track->file_path}")}}" type="video/mkv">
                                                    your browser does not support the file type
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

                            <input id="overall-rating" class="rating rating-loading" value="{{$avgRating}}" data-min="0" data-max="5" data-step="0.5" data-size="md"><hr/>

                            @if ((auth()->check()))
                            <label for="rating" class="control-label">Give a rating for this track:</label>
                            <input id="rating" class="rating rating-loading" value="{{@$personalRating->rating}}" data-min="0" data-max="5" data-step="0.5" data-size="md"><hr/>
                            @endif
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@stop
@section('scripts')
<script>
    $('#rating').on('rating:change', function() {
        let rating = $('#rating').val();
        $.ajax({
            type: "POST",
            url: "{{url('track/rate')}}",
            data: JSON.stringify({
                "_token": "{{ csrf_token() }}",
                'track_id': {{$track->id}},
                'rating' : rating,
                'action' : 'add/update'
            }),
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                return true;
            },
            error: function (error) {
            }
        });
    });

    $('#rating').on('rating:clear', function(event) {
        $.ajax({
            type: "POST",
            url: "{{url('track/rate')}}",
            data: JSON.stringify({
                "_token": "{{ csrf_token() }}",
                'track_id': {{$track->id}},
                'action' : 'delete'
            }),
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                return true;
            },
            error: function (error) {
            }
        });
    });

    $(document).ready(function() {
        $('#rating').rating('refresh', {disabled: false, showClear: true, showCaption: false});
        $('#overall-rating').rating('refresh', {disabled: true, showClear: false, showCaption: false});
    });
</script>
@stop
