<!-- Start Footer
    ============================================= -->
<footer class="bg-dark text-light">
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <img src="{{asset('assets/img/logo-3.png')}}" class="logo" alt="Logo">
                        <p>
                            Let the music speak. My brain is 85% song lyrics. Music is my life, we can't live without each other.
                        </p>
                        <div class="address">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-email"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Email:</h5>
                                        <span>support@musicmob.com</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Phone:</h5>
                                        <span>+44-20-7328-4499</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Music</h4>
                        <ul>
                            @foreach(allMusicCategories() as $item)
                                <li><a href="{{url('music')}}/{{$item->id}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Useful Links</h4>
                        <ul>
                            <li>
                                <a href="{{url('about')}}">About</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-4 col-md-6 item">
                    <div class="f-item branches">
                        <div class="branches">
                            <ul>
                                <li>
                                    <strong>USA Branches:</strong>
                                    <span>4992 Bryan Avenue, Prior Lake, Minnesota <br> Phone: 651-379-4698</span>
                                </li>
                                <li>
                                    <strong>Central Branches:</strong>
                                    <span>2001 Kia Magentis, Prior Lake, Minnesota <br> Phone: 651-379-4698</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- jQuery Frameworks
============================================= -->
<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/equal-height.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.custom.13711.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/progress-bar.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/count-to.js')}}"></script>
<script src="{{asset('assets/js/YTPlayer.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/bootsnav.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
@yield('scripts')
</body>
</html>
