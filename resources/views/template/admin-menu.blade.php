<nav role="navigation" class="sidebar sidebar-bg-white sidebar-rounded-top-right shadow-sm" id="navbar-container">
    <div class="sidebar-menu">
        <div class="sidebar-menu-fixed">
            <div class="scrollbar scrollbar-bg-white scrollbar-use-navbar ps ps--active-y">
                <ul class="list list-unstyled list-bg-white mb-0">
                    <li class="list-item">
                        <div class="border-bottom px-3 d-flex">
                            <a class="navbar-brand logo" href="{{url('admin')}}" style="padding: 0px !important;">
                                <img  src="{{asset('assets/img/logo-3.png')}}" height="80" width="75" alt="Music Streaming Logo" class="logo-menu">
                            </a>
                            <a class="nav-link sidebar-toggle sidebar-close-btn ms-4 mt-2" style="display:none;" data-widget="pushmenu" href="javascript:void(0);" role="button"><i class="fal fa-arrow-left"></i></a>
                        </div>
                            <div class="ms-3 user-info">
                                <img src="{{asset('assets/admin/images/user.png')}}" alt="" height="50px">
                                <span class="user-info-text">
                                        <strong>Application Admin</strong>
                            </span>
                            </div>

                    </li>
                </ul>
                <!-- Menu Items Start -->
                <div id="sidebar" style="height: auto">
                    <ul class="list list-unstyled list-bg-white mb-0">
                        <li class="list-item">
                            <ul class="list-unstyled">
                                    <li>
                                        <a href="{{url('admin')}}" class="list-link">
                                    <span class="list-icon">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </span><span class="menu-title">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/music-category')}}" class="list-link">
                                            <span class="list-icon"><i class="fal fa-sliders-h"></i></span>
                                            <span class="menu-title">Music Category</span>
                                        </a>
                                    </li>
                                <li>
                                    <a href="{{url('admin/track')}}" class="list-link">
                                        <span class="list-icon"><i class="fal fa-music"></i></span>
                                        <span class="menu-title">Music Track</span>
                                    </a>
                                </li>


                                <li>
                                    <a href="{{('admin/logout')}}" class="list-link bg-dark text-white">
                                        <i class="fal fa-sign-out" style="color:white!important ;"></i>
                                        <span class="menu-title">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
