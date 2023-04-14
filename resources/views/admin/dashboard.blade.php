@extends('template.admin-index')

@section('page-name')
   Dashboard
@stop
@section('title')
    Dashboard
@stop
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-muted text-decoration-none">Dashboard</a></li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="form-label m-0">Tracks Per Category</h6>
                </div>
                <div class="card-body">
{{--                    @if(count($data['track_count']))--}}
                        <div id="music-per-category"></div>
{{--                    @else--}}
{{--                        <div class="alert alert-info">No data found</div>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    {!! loadChartScripts() !!}
    <script>
        //Graph - Number of tracks per category
{{--        @if(count($data) > 0)--}}
            data = <?php echo json_encode($data) ?>;
        // if (data.categories.length > 0 && data.track_count.length > 0) {
        pieChart('music-per-category', data.data);
        // }
{{--        @endif--}}

    </script>
@stop
