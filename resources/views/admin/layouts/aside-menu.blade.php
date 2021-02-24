<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item @yield('dashboard_nav')" aria-haspopup="true">
                <a href="{{ route('admin.index') }}" class="menu-link">
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
                        <li class="menu-item @yield('projects_missed_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Missed</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('projects_bidded_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Bidded</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('projects_replied_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Replied</span>
                            </a>
                        </li>

                        <li class="menu-item @yield('projects_accepted_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Accepted</span>
                            </a>
                        </li>

                        <li class="menu-item @yield('projects_filters_setting_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Filters Setting</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="menu-item menu-item-submenu @yield('helpers_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i style="font-size: 1.4rem!important;" class="menu-icon icon-lg far fa-smile"></i>
                    <span class="menu-text">Helpers</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('helpers_starter_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.helpers.starter.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Starter</span>
                            </a>
                        </li>
                        
                        <li class="menu-item @yield('helpers_tech_star_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Tech Star</span>
                            </a>
                        </li>
                        
                        <li class="menu-item @yield('helpers_portfolio_initiator_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Portfolio Initiator</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('helpers_ender_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Ender</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="menu-item menu-item-submenu @yield('portfolio_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-suitcase"></i>
                    <span class="menu-text">Portfolio</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('portfolio_items_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.portfolio.items.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Items</span>
                            </a>
                        </li>
                        
                        <li class="menu-item @yield('portfolio_skills_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.portfolio.skills.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Skills</span>
                            </a>
                        </li>
                        
                        <li class="menu-item @yield('portfolio_industries_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.portfolio.industries.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Industries</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('portfolio_types_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.portfolio.types.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Types</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="menu-item menu-item-submenu @yield('shift_management_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-clock-1"></i>
                    <span class="menu-text">Shift Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('shift_management_schedule_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Schedule</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('shift_management_hours_logged_nav')" aria-haspopup="true">
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

            <li class="menu-item menu-item-submenu @yield('leaves_management_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-calendar-3"></i>
                    <span class="menu-text">Leaves Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('leaves_management_requests_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Requests</span>

                                <span class="menu-label">
                                    <span class="label label-danger label-inline">1</span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item @yield('leaves_management_all_leaves_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">All Leaves</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu @yield('stats_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-diagram"></i>
                    <span class="menu-text">Stats</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('stats_heartbeat_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Heartbeat</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('stats_progress_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item @yield('income_nav')" aria-haspopup="true">
                <a href="" class="menu-link">
                    <i class="menu-icon flaticon-coins"></i>
                    <span class="menu-text">Income</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu @yield('payouts_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-notepad"></i>
                    <span class="menu-text">Payouts</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('payouts_history_nav')" aria-haspopup="true">
                            <a href="" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">History</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('payouts_current_month_nav')" aria-haspopup="true">
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


            <li class="menu-item menu-item-submenu @yield('users_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-users"></i>
                    <span class="menu-text">Users</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('users_all_users_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">All Users</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('users_designations_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.users.designations.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Designations</span>
                            </a>
                        </li>

                        <li class="menu-item @yield('users_add_user_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.users.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Add New User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="menu-item menu-item-submenu @yield('settings_nav')" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-settings"></i>
                    <span class="menu-text">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <ul class="menu-subnav">
                        <li class="menu-item @yield('settings_api_keys_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.settings.api_keys') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">API Keys</span>
                            </a>
                        </li>
                        <li class="menu-item @yield('settings_profile_nav')" aria-haspopup="true">
                            <a href="{{ route('admin.settings.profile') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                <span class="menu-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item" aria-haspopup="true">
                <a href="javascript:;" class="menu-link btn_logout">
                    <i class="menu-icon flaticon-logout"></i>
                    <span class="menu-text">Logout</span>
                </a>

            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
</div>
<!--end::Aside-->