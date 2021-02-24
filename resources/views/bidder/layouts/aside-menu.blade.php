
<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item @yield('dashboard_nav')" aria-haspopup="true">
                <a href="{{ route('bidder.index') }}" class="menu-link">
                    <i class="menu-icon flaticon-dashboard"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu @yield('projects_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-list"></i>
                    <span class="menu-text">Projects</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('projects_live_feed_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Live Feed</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('projects_bid_later_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Bid Later</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu @yield('shift_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-clock-1"></i>
                    <span class="menu-text">Shift</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('shift_schedule_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Schedule</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('shift_hours_logged_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Hours Logged</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu @yield('leaves_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-calendar-3"></i>
                    <span class="menu-text">Leaves</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('leaves_all_leaves_nav')" aria-haspopup="true">
                            <a href="{{ route('bidder.leaves.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">All Leaves</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu @yield('income_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-coins"></i>
                    <span class="menu-text">Income</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('income_payouts_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Payouts</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('income_current_month_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Current Month</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="menu-item menu-item @yield('settings_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('bidder.settings.index') }}" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-settings"></i>
                    <span class="menu-text">Settings</span>
                </a>
            </li>

            <li class="menu-item menu-item" aria-haspopup="true">
                <a href="javascript:;" class="menu-link btn_logout btn_logout">
                    <i class="menu-icon flaticon-logout"></i>
                    <span class="menu-text">Logout</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside-->