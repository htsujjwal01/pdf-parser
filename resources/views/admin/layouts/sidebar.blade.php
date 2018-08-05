    <style>
        #container:not(.mainnav-sm) #mainnav-menu-wrap > .nano > .nano-content {
            padding-top: 0;
        }
    </style>


    <!--MAIN NAVIGATION-->
    <!--===================================================-->
    <nav id="mainnav-container">
        <div id="mainnav">

            <!--Menu-->
            <!--================================-->
            <div id="mainnav-menu-wrap">
                <div class="nano">
                    <div class="nano-content">

                        <!--Profile Widget-->
                        <!--================================-->
                        {{-- <div id="mainnav-profile" class="mainnav-profile">
                            <div class="profile-wrap">
                                <div class="pad-btm">
                                    <span class="label label-success pull-right">New</span>
                                    <img class="img-circle img-sm img-border" src="img/profile-photos/1.png" alt="Profile Picture">
                                </div>
                                <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                    <span class="pull-right dropdown-toggle">
                                        <i class="dropdown-caret"></i>
                                    </span>
                                    <p class="mnp-name">Aaron Chavez</p>
                                    <span class="mnp-desc">aaron.cha@themeon.net</span>
                                </a>
                            </div>
                            <div id="profile-nav" class="collapse list-group bg-trans">
                                <a href="#" class="list-group-item">
                                    <i class="ti-medall icon-lg icon-fw"></i> Link 1
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="ti-paint-roller icon-lg icon-fw"></i> Link 2
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="ti-heart icon-lg icon-fw"></i> Link 3
                                </a>
                            </div>
                        </div> --}}


                        <!--Shortcut buttons-->
                        <!--================================-->
                        {{-- <div id="mainnav-shortcut">
                            <ul class="list-unstyled">
                                <li class="col-xs-4" data-content="Shortcut 1">
                                    <a class="shortcut-grid" href="#">
                                        <i class="ti-gallery"></i>
                                    </a>
                                </li>
                                <li class="col-xs-4" data-content="Shortcut 2">
                                    <a class="shortcut-grid" href="#">
                                        <i class="ti-headphone"></i>
                                    </a>
                                </li>
                                <li class="col-xs-4" data-content="Shortcut 3">
                                    <a class="shortcut-grid" href="#">
                                        <i class="ti-pin-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        <!--================================-->
                        <!--End shortcut buttons-->

                        <ul id="mainnav-menu" class="list-group">

				            <!--Category name-->
				            <li class="list-header">Navigation</li>



                                <!-- Slider List -->
                                <li>
                                    <a href="{{ route('admin.sliders.edit', 1) }}">
                                        <i class="fa fa-sliders"></i>
                                        <span class="menu-title">Slider</span>
                                        {{-- <i class="arrow"></i> --}}
                                    </a>
                                </li>

                                <!-- Videos List -->
                                <li>
                                    <a href="{{ route('admin.videos') }}">
                                        <i class="fa fa-reorder"></i>
                                        <span class="menu-title">Content</span>
                                        {{-- <i class="arrow"></i> --}}
                                    </a>
                                </li>

                                <!-- MyCities List -->
                                <li>
                                    <a href="{{ route('admin.myCities') }}">
                                        <i class="fa fa-map-marker"></i>
                                        <span class="menu-title">My City</span>
                                    </a>
                                </li>


                                <!--  User List -->
                                <li>
                                    <a href="{{ route('admin.users') }}">
                                        <i class="fa fa-users"></i>
                                        <span class="menu-title">Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-sitemap"></i>
                                        <span class="menu-title">Contests (Coming Soon)</span>
                                    </a>
                                </li>




                          




				           {{-- <li class="list-divider"></li>

				            <!--Category name-->
				            <li class="list-header">Submenus</li>


				            <!--Menu list item-->
				            <li>
				                <a href="#">
				                    <i class="ti-alarm-clock"></i>
				                    <span class="menu-title">
										<strong>Bolder</strong>
									</span>
				                </a>
				            </li>

				            <!--Menu list item-->
				            <li>
				                <a href="#">
				                    <i class="ti-calendar"></i>
				                    <span class="menu-title">
										With label
										<span class="label label-success pull-right">New</span>
									</span>
				                </a>
				            </li>

				            <!--Menu list item-->
				            <li>
				                <a href="#">
				                    <i class="ti-cloud"></i>
				                    <span class="menu-title">
										With badge
										<span class="pull-right badge badge-purple">7</span>
									</span>
				                </a>
				            </li>

                        </ul>


                        <!--Widget-->
                        <!--================================-->
                        <div class="mainnav-widget">

                            <!-- Show the button on collapsed navigation -->
                            <div class="show-small">
                                <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                    <i class="fa fa-desktop"></i>
                                </a>
                            </div>

                            <!-- Hide the content on collapsed navigation -->
                            <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                <ul class="list-group">
                                    <li class="list-header pad-no pad-ver">Simple Widget</li>
                                    <li class="mar-btm">
                                        <span class="label label-primary pull-right">15%</span>
                                        <p>CPU Usage</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                <span class="sr-only">15%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mar-btm">
                                        <span class="label label-purple pull-right">75%</span>
                                        <p>Bandwidth</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                <span class="sr-only">75%</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End widget--> --}}

                    </div>
                </div>
            </div>
            <!--================================-->
            <!--End menu-->

        </div>
    </nav>
    <!--===================================================-->
    <!--END MAIN NAVIGATION-->

    <!--ASIDE-->
    <!--===================================================-->
    <aside id="aside-container">
        <div id="aside">
            <div class="nano">
                <div class="nano-content">

                    <!--Nav tabs-->
                    <!--================================-->
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active">
                            <a href="#demo-asd-tab-1" data-toggle="tab">
                                <i class="ti-comments"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#demo-asd-tab-2" data-toggle="tab">
                                <i class="ti-info-alt"></i>
                                Reports
                            </a>
                        </li>
                        <li>
                            <a href="#demo-asd-tab-3" data-toggle="tab">
                                <i class="ti-settings"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                    <!--================================-->
                    <!--End nav tabs-->



                    <!-- Tabs Content -->
                    <!--================================-->
                    <div class="tab-content">

                        <!--First tab-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div class="tab-pane fade in active" id="demo-asd-tab-1">
                            <p class="pad-all text-lg">First tab</p>
                            <div class="pad-hor">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                        </div>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End first tab-->


                        <!--Second tab-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div class="tab-pane fade" id="demo-asd-tab-2">
                            <p class="pad-all text-lg">Second tab</p>
                            <div class="pad-hor">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                        </div>
                        <!--End second tab-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                        <!--Third tab-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div class="tab-pane fade" id="demo-asd-tab-3">
                            <p class="pad-all text-lg">Third tab</p>
                            <div class="pad-hor">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate
                                velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                            </div>
                        </div>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!--===================================================-->
    <!--END ASIDE-->

</div>
