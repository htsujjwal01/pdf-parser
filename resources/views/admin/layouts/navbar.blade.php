<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="/" class="navbar-brand">
                <img src="/build/img/admin/logo.png" alt="" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">TheUML Dash</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="ti-view-list icon-lg"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->



                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                {{-- <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="ti-bell icon-lg"></i>
                        <span class="badge badge-header badge-danger"></span>
                    </a>

                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md">
                        <div class="pad-all bord-btm">
                            <p class="text-semibold text-main mar-no">You have 3 notifications.</p>
                        </div>
                        <div class="nano scrollable">
                            <div class="nano-content">
                                <ul class="head-list">

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <p class="pull-left">Progressbar</p>
                                                <p class="pull-right">70%</p>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div style="width: 70%;" class="progress-bar">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <i class="ti-truck icon-lg"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">With Icon</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">
                                                <i class="ti-plug icon-lg"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">With Icon</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">

                            <span class="icon-wrap icon-circle bg-primary">
                                <i class="ti-layout icon-lg"></i>
                            </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Circle Icon</div>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                    <span class="badge badge-success pull-right">90%</span>
                                            <div class="media-left">

                            <span class="icon-wrap icon-circle bg-danger">
                                <i class="ti-crown icon-lg"></i>
                            </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Circle icon with badge</div>
                                                <small class="text-muted">50 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                            <div class="media-left">

                            <span class="icon-wrap bg-info">
                                <i class="ti-camera icon-lg"></i>
                            </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Square Icon</div>
                                                <small class="text-muted">Last Update 8 hours ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <!-- Dropdown list-->
                                    <li>
                                        <a href="#" class="media">
                                    <span class="label label-danger pull-right">New</span>
                                            <div class="media-left">

                            <span class="icon-wrap bg-purple">
                                <i class="ti-bolt icon-lg"></i>
                            </span>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-nowrap">Square icon with label</div>
                                                <small class="text-muted">Last Update 8 hours ago</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top">
                            <a href="#" class="btn-link text-dark box-block">
                                <i class="ti-angle-right pull-right"></i>Show All Notifications
                            </a>
                        </div>
                    </div>
                </li> --}}
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->



                <!--Mega dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                {{-- <li class="mega-dropdown">
                    <a href="#" class="mega-dropdown-toggle">
                        <i class="ti-view-grid icon-lg"></i>
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="clearfix">
                            <div class="col-sm-12 col-md-3">

                                <!--Mega menu widget-->
                                <div class="text-center bg-info pad-all">
                                    <h4 class="text-light mar-no">Weekend shopping</h4>
                                    <div class="pad-ver box-inline">
                                        <span class="icon-wrap icon-wrap-lg icon-circle bg-trans-light">
                                            <i class="ti-shopping-cart-full icon-4x"></i>
                                        </span>
                                    </div>
                                    <p class="pad-btm">
                                        Members get <span class="text-lg text-bold">50%</span> more points. Lorem ipsum dolor sit amet!
                                    </p>
                                    <a href="#" class="btn btn-info">Learn More...</a>
                                </div>

                            </div>
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Pages</li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Search Result</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Sreen Lock</a></li>
                                    <li><a href="#" class="disabled">Disabled</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Icons</li>
                                    <li><a href="#"><span class="pull-right badge badge-purple">479</span> Font Awesome</a></li>
                                    <li><a href="#">Skycons</a></li>
                                </ul>

                            </div>
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Mailbox</li>
                                    <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                    <li><a href="#">Read Message</a></li>
                                    <li><a href="#">Compose</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Featured</li>
                                    <li><a href="#">Smart navigation</a></li>
                                    <li><a href="#"><span class="pull-right badge badge-success">6</span>Exclusive plugins</a></li>
                                    <li><a href="#">Lot of themes</a></li>
                                    <li><a href="#">Transition effects</a></li>
                                </ul>

                            </div>
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header">Components</li>
                                    <li><a href="#">Tables</a></li>
                                    <li><a href="#">Charts</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <form role="form" class="form">
                                            <div class="form-group">
                                                <label class="dropdown-header" for="demo-megamenu-input">Newsletter</label>
                                                <input id="demo-megamenu-input" type="email" placeholder="Enter email" class="form-control">
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End mega dropdown-->
                --}}
            </ul>




            <ul class="nav navbar-top-links pull-right">

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li >
                    <a href="{{ route('admin.logout') }}" class="text-right">

                                <i class="ti-lock icon-fw"></i> Logout

                        <!--<span class="pull-right">-->
                            <!-- You may use image instead of an icon.
                            <!--<img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture">-->
                            <!--<i class="ti-face-smile ic-user"></i>-->
                        <!--</span>-->
                        {{-- <div class="username hidden-xs">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div> --}}
                    </a>


                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                        <!-- Dropdown heading  -->
                        {{-- <div class="pad-all bord-btm">
                            <p class="text-main mar-btm"><span class="text-bold">750GB</span> of 1,000GB Used</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width: 70%;">
                                    <span class="sr-only">70%</span>
                                </div>
                            </div>
                        </div> --}}


                        <!-- User dropdown menu -->
                        {{-- <ul class="head-list">
                            <li>
                                <a href="#">
                                    <i class="ti-user icon-fw icon-lg"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge badge-danger pull-right">9</span>
                                    <i class="ti-email icon-fw icon-lg"></i> Messages
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success pull-right">New</span>
                                    <i class="ti-settings icon-fw icon-lg"></i> Settings
                                </a>
                            </li>
                        </ul> --}}

                        <!-- Dropdown footer -->
                        <div class="pad-all text-right">
                            <a href="{{ route('admin.logout') }}" class="btn btn-primary">
                                <i class="ti-unlock icon-fw"></i> Logout
                            </a>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

                {{-- <li>
                    <a href="#" class="aside-toggle navbar-aside-icon">
                        <i class="pci-ver-dots"></i>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
<!--===================================================-->
<!--END NAVBAR-->
