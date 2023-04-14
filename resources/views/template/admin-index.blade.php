<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Music Streaming Admin">
    <meta name="author" content="Music Streaming Admin">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!--  Favicons-->
    <link rel="shortcut icon" href="{{asset('assets/img/logo-3.png')}}" type="image/x-icon">


    <title>@yield('page-detail') @yield('page-name') - Admin | Music Streaming</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href='{{asset("assets/admin/bootstrap/bootstrap.min.css")}}'>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/admin/select2/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/select2/select2-bootstrap-5-theme.min.css')}}"/>
    <!-- Datatables CSS -->
    <link href="{{asset('assets/admin/jquery-datatable/jquery.dataTables.min.css')}}" rel="stylesheet">

    <!-- Sweet alert -->
    <link rel="stylesheet" href="{{asset('assets/admin/sweet-alert/sweetalert.min.css')}}">

    {{-- Fontawesome Icons --}}
    <link rel="stylesheet" href="{{asset('assets/admin/fontawesome/css/all.css')}}"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- Menu -->
    <link rel="stylesheet" href='{{ asset("assets/admin/menu/sidebar.menu.css") }}'>

    <!-- Main style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <!-- Start Page Level CSS -->
    @yield('styles')
    <!-- End Page Level CSS -->
</head>
@php
    $this_user = Auth::user();
@endphp

<body>

<div class="d-flex wrapper wrapper-navbar-fixed wrapper-navbar-used">
    @include('template.admin-menu')
    <div class="container-fluid" id="content-container">
        <!-- content -->
        <main role="main">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <nav
                            class="main-header navbar navbar-expand navbar-white navbar-light ms-2 desktop-sidebar-btn">
                            <!-- Left navbar links -->
                            <ul class="navbar-nav desktop-sidebar-btn">
                                <li class="nav-item">
                                    <a class="nav-link sidebar-toggle" data-widget="pushmenu" href="javascript:void(0);"
                                       role="button"><i class="fas fa-bars"></i></a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Breadcrumbs -->
                        <nav aria-label="breadcrumb" style="margin-top: 15px;">
                            <ol class="breadcrumb small">
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="page-title bg-light p-2 border-top border-bottom">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h4 class="m-0 text-capitalize form-label">@yield('title')</h4>
                        </div>
                        <div
                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-sm-start page-actions">
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
                <!-- Start Main content -->
                <div class="container-fluid my-3 no-space">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal Box -->
<div class="modal fade" id="global-modal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="global-modal-title"></h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="global-modal-body">
                Something went wrong
            </div>
        </div>
    </div>
</div>

<script src='{{ asset("assets/admin/jquery/jquery-3.6.0.min.js") }}'></script>

<!-- JavaScript Bundle with Popper -->
<script src='{{ asset("assets/admin/bootstrap/bootstrap.bundle.min.js") }}'></script>

<!-- jQuery Validation -->
<script src='{{ asset("assets/admin/jquery-validate/jquery.validate.min.js") }}'></script>

<!-- Sweet alert -->
<script src='{{ asset("assets/admin/select2/sweetalert2.js") }}'></script>

<!-- BlockUI -->
<script src='{{ asset("assets/admin/jquery-block-ui/jquery.blockUI.js") }}'></script>

<!-- Menu JS -->
<script src='{{ asset("assets/admin/menu/sidebar.menu.js") }}'></script>

<!-- jQuery UI -->
<script src='{{ asset("assets/admin/jquery-ui/jquery-ui.js") }}'></script>

<!-- SlimScroll -->
<script src='{{ asset("assets/admin/slim-scroll/jquery.slimscroll.js") }}'></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Jquery Validation -->
<script src='{{ asset("assets/admin/jquery-validate/jquery.validate-1.19.3.min.js") }}'></script>

<script src='{{ asset("assets/admin/jquery-block-ui/jquery.blockUI.js") }}'></script>

<!-- Select2 -->
<script src='{{ asset("assets/admin/select2/select2.min.js") }}'></script>

<!-- Datatables JS -->
<script src='{{ asset("assets/admin/jquery-datatable/jquery.dataTables.min.js") }}'></script>

<!-- Pusher JS -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<!-- End Global JS Libraries -->

<!-- Start  Global JS Libraries -->
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<!-- End Global JS Libraries -->

<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "inherit" );
    });

    $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "auto" );
    });

    // Color for charts
    colors_array = ['#B580D1', '#221551', '#0d6efd', '#646566', '#dc3545', '#0dcaf0', '#198754', '#6AF9C4', '#ffc107', '#270e29'];

    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap-5'
    });

    function toast(title, type) {
        Swal.fire({
            toast: true,
            title: title,
            text: '',
            type: type,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            // timerProgressBar: true,
        });
    }

    function open_modal(url) {
        $.blockUI();
        $.ajax({
            url: url,
            type: "GET",
            data: {},
            dataType: "json",
            cache: false,
            success: function (res) {
                $("#global-modal-title").html(res.title);
                $("#global-modal-body").html(res.html);
                if ($("#global-modal-body").find('.select2')) {
                    $("#global-modal-body").find('.select2').select2({
                        theme: "bootstrap-5",
                        dropdownParent: $('#global-modal')
                    });
                }
                $("#global-modal").modal("show");
                $.unblockUI();
            }
        });
    }

</script>

<script>
    @include('partials.response')
</script>
<!-- Start Page Level -->
@yield('scripts')
<!-- End Page Level -->
@stack('javascript')
</body>

</html>
