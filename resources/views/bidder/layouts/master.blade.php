
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta name = "csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('page_title', "Ginormous | Let's beat the world")</title>
    <meta name="description" content="No subheader example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    @section('page_vendor_css')
    @show
    <!--end::Page Vendors Styles-->
    
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('metronic/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('metronic/dist/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('images/fav-icon.png') }}" />
    <style>
        .header_user_icon {
            position: relative;
            top: 2px;
        }
        
        .login_as_text {
            font-size: 11px;
            position: relative;
            bottom: 1px;
        }

        .notification_card_icon {
            font-size: 30px;
        }
    </style>
    
    @section('page_css')
    @show
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{ route('admin.index') }}">
            <img width="130" alt="Logo" src="{{ asset('images/logo-white.png') }}" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
            <!--end::Aside Mobile Toggle-->

            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    <!--begin::Logo-->
                    <a href="{{ route('admin.index') }}" class="brand-logo">
                        <img width="140" alt="Logo" src="{{ asset('images/logo-white.png') }}" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->
                @include('bidder.layouts.aside-menu')
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <div class="mt-2 welcome_msg">
                            <p class="mt-5">
                                <span class="d-none d-lg-inline"><span class="font-weight-normal">{{ date('d M Y') }}</span> <span class="font-weight-bold">({{ date('h:i A') }})</span>

                                <span class="d-lg-none">
									
								</span>
                            </p>
                        </div>
                        <div class="topbar">
                            <div class="topbar-item">
                                <a href="{{ route('bidder.projects.bid_later') }}" class="bid_later_counter btn btn-warning btn-sm mr-4 @if(!$bid_later_counter) d-none @endif">Bid Later: <span class="label label-inline label-white label-sm">{{ $bid_later_counter }}</span></a>
                                <a href="{{ route('bidder.projects.live_feed') }}" class="btn btn-danger btn-sm">Start Bidding</a>
                            </div>
                        </div>
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Languages-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class='mr-2'>
											<span class="d-none d-lg-inline">Welcome </span><b class="d-none d-lg-inline">{{ Auth::user()->name }}</b>
                                    <span class="d-lg-none">Welcome </span><span class="d-lg-none">{{ Auth::user()->name }}</span>
                                    </span>
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                        <img class="h-20px w-20px rounded-sm" src="{{ route('image_source', ['user', Auth::user()->picture ]) }}" alt="Avatar" />
                                    </div>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Nav-->
                                    <ul class="navi navi-hover py-4">
                                        <!--begin::Item-->
                                        <li class="navi-item">
                                            <a href="{{ route('bidder.settings.index') }}" class="navi-link">
                                                <span class="symbol symbol-20 mr-3">
														<i class="fa fa-cog header_user_icon"></i>
													</span>
                                                <span class="navi-text user_profile">Settings</i></span>
                                            </a>
                                        </li>

                                        <li class="navi-item">
                                            <a href="javascript:;" class="navi-link btn_logout">
                                                <span class="symbol symbol-20 mr-3">
														<i class="fa fa-power-off header_user_icon"></i>
													</span>
                                                <span class="navi-text user_logout">Logout</span>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Languages-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Section-->

                   @section('main')
                   @show

                    <!--end::Section-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            Made with <img width="22" src="https://zino.brhythym.com/images/heart.gif"> by <a href="https://zinormous.com" target="_blank" class="text-dark-75 text-hover-primary">Zinormous</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            &copy; All rights reserved by&nbsp;<a class="text-dark-75 text-hover-primary" href="https://zino.brhythym.com">Ginormous</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
    </div>


    <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    @section("page_partials")
    @show

    <!--end::Scrolltop-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('metronic/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/dist/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('metronic/dist/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->

    @section('page_vendor_js')
    @show

    @section('page_js')
    @show

    <script>
        $(".btn_logout").on("click", function(e){
            $("#logout_form").submit();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "Error");
        @endif
        
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}", "Success");
        @endif
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}", "Error");
            @endforeach
        @endif

        $('.action_btn.miss_it, .action_btn.bid_later').on('click', function(){
            setTimeout(function(){
                $.ajax({
                    method: "get",
                    url: "{{ route('bidder.bid_later_counter') }}",
                    dataType: "JSON",
                    success: function(response){
                        console.log(response.counter);
                        if(response.counter > 0){
                            $(".bid_later_counter").removeClass('d-none');
                            $(".bid_later_counter").addClass('d-inline-block');
                            $(".bid_later_counter .label").html(response.counter);
                        }else{
                            $(".bid_later_counter").removeClass('d-inline-block');
                            $(".bid_later_counter").addClass('d-none');
                            $(".bid_later_counter .label").text(response.counter);
                        }
                    }
                });
            }, 1000);
            
        });


    </script>

</body>
<!--end::Body-->

</html>