<!-- Start Breadcrumb
    ============================================= -->
<div class="breadcrumb-area bg-gradient text-center">
    <!-- Fixed BG -->
    <div class="fixed-bg" style="background-image: url({{asset('assets/img/shape/9.png')}});"></div>
    <!-- Fixed BG -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>{{@$heading}}</h1>
                <ul class="breadcrumb">
                    @foreach($list as $key => $value)
                        @if(!$loop->last)
                            <li><a href="{{url("$key")}}">{{$value}}</a></li>
                        @else
                            <li class="active">{{$value}}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
