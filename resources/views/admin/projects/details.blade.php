@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Projects
                </li>
                <li class="breadcrumb-item">
                    Project Details
                </li>
            </ul>
        </div>
    </div>


    <div class="card card-custom mb-6">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">

            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#tab_1">
                            <span class="nav-text font-size-lg">Project Details</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#tab_2">
                            <span class="nav-text font-size-lg">Proposals</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#tab_3">
                            <span class="nav-text font-size-lg">Helper</span>
                        </a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#tab_4">
                            <span class="nav-text font-size-lg">Bid</span>
                        </a>
                    </li>
                    <!--end::Item-->
                </ul>
            </div>
            <!--end::Toolbar-->


            <div class="card-title">
                <button id="kt_quick_user_toggle" class="btn btn-primary"><i class="flaticon-price-tag"></i>Bid Now</button>
            </div>

        </div>
        <!--end::Card header-->
        <!--begin::Card body-->

    </div>



    <div class="tab-content">
        <!--begin::Tab-->
        <div class="tab-pane show active" id="tab_1" role="tabpanel">
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">JavaScript quiz game development
                                    <br />
                                    <small>
                                        <i style="font-size: 11px;" class="fa fa-clock"></i> 1 day ago
                                    </small>
                                </h3>
                            </div>

                            <div class="card-title">
                                $30.00 - $250.00
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold">Details:</label>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                                    </p>
                                    <div class="mt-7">
                                        <label class="font-weight-bold">Skills:</label>
                                    </div>
                                    <p>
                                        <span class="label label-xl label-default label-inline mr-2">HTML</span>
                                        <span class="label label-xl label-default label-inline mr-2">CSS</span>
                                        <span class="label label-xl label-default label-inline mr-2">PHP</span>
                                        <span class="label label-xl label-default label-inline mr-2">LARAVEL</span>
                                        <span class="label label-xl label-default label-inline mr-2">PHP</span>
                                        <span class="label label-xl label-default label-inline mr-2">MySQL</span>
                                    </p>
                                    <div class="mt-7">
                                        <label class="font-weight-bold">Attachments:</label>
                                    </div>
                                    <p>
                                        <a href="https://zino.brhythym.com/files/UI-Screen.pdf" target="_blank" class="btn btn-light-primary py-1 px-4">UI-Screen.pdf</a>
                                        <a href="https://zino.brhythym.com/files/Pointers.docx" download class="btn btn-light-primary py-1 px-4">Pointers.docx</a>
                                        <a href="https://zino.brhythym.com/files/All-Screens.zip" download class="btn btn-light-primary py-1 px-4">All-Screens.zip</a>
                                    </p>

                                    <div class="text-right">
                                        Project ID: 29185616
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card card-custom card-stretch gutter-b">

                        <div class="card-body text-center">
                            <img style="width: 120px; height: 120px;" class="rounded-circle" src="https://zino.brhythym.com/images/joe-alwyn.jpg">
                            <p class="font-weight-bold mt-4 font-size-h6 mb-0">Ahmad Ayaz <br /> <span class="font-weight-normal text-dark-50 font-size-sm">Germany</span> <img style="width: 18px;" src="https://zino.brhythym.com/images/germany-flag.png"></p>
                            <div class="mt-1 mb-1 text-left mt-4">
                                <span class="inline-block font-size-sm">
                                    4.9 Reviews
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                     (24 Reviews)
                                    </span>
                                <br />
                                <i class="fa fa-clock font-size-sm"></i> Member Since Dec 11 2013
                            </div>

                            <div class="text-left mt-4">
                                <h4 class="font-size-sm font-weight-bolder">Employer Verification</h4>
                                <i class="fa fa-check-circle text-success font-size-sm"></i> Identity verified
                                <br />
                                <i class="fa fa-times-circle text-danger font-size-sm"></i> Payment method verified
                                <br />
                                <i class="fa fa-check-circle text-success font-size-sm"></i> Deposite made
                                <br />
                                <i class="fa fa-check-circle text-success font-size-sm"></i> Email address verified
                                <br />
                                <i class="fa fa-times-circle text-danger font-size-sm"></i> Profile completed
                                <br />
                                <i class="fa fa-check-circle text-success font-size-sm"></i> Phone number verified
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab-pane" id="tab_2" role="tabpanel">
            <!--begin::Row-->
            <div class="row mb-6">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="float-left">
                                        <img src="https://zino.brhythym.com/images/logo-3.jpg" style="height:80px;">
                                    </div>
                                    <div class="float-left ml-4">
                                        <img src="https://zino.brhythym.com/images/germany-flag.png" style="width:30px;"> <span class="font-size-h3 font-weight-bold ml-1">Fullstack Developer</span>
                                        <span class="font-size-h3 font-weight-normal text-dark-50">@fullstackdev1</span>
                                        <p class="text-dark-50 font-size-h6 mt-2 mb-2">Wordpress Shopify Prestashop Magento PHP WIX UI/UX</p>
                                        <span title="Ratings" data-toggle="tooltip">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i> <span class="font-size-h6">5.0</span>
                                        </span>
                                        
                                        <span data-toggle="tooltip" title="Reviews"><i class="fab fa-rocketchat text-info ml-6"></i> <span class="font-size-h6">557</span></span>
                                        
                                        <span title="Money" data-toggle="tooltip"><span class="text-success font-size-h3 font-weight-bold ml-6">$</span> <span class="text-success font-weight-boldest" style="letter-spacing: 1px; position: relative; bottom: 2px;">|||||||<span class="text-muted">||</span></span><span class="font-size-h6">8.1</span></span>

                                        <span data-toggle="tooltip" title="Completion Rate"><i class="fas fa-circle-notch text-primary ml-4 font-size-h4"></i> <span class="font-size-h6">100%</span></span>
                                    </div>
                                </div>

                                <div class="col-lg-4 text-right">
                                    <h3>$400.00 USD</h3>
                                    <h6>in 9 days</h6>



                                </div>

                                <div class="col-lg-12 mt-8">
                                    <h6>Greetings!!</h6>
                                    <div class="font-size-lg mt-4">
                                        I have read your project. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="dots">...</span>
                                        <div class="more d-none">
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. <br /> It was popularised in the 1960s with the release of Letraset sheets containing
                                            <p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. I have read your project. Lorem Ipsum is simply dummy text
                                                of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            <p>Regards, <br /> Ahmad Ayaz</p>
                                        </div>
                                        <button class="btn btn-link p-0 readmore">Read More</button>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-right">
                                    <h6 class="text-dark-50 font-size-h6 font-weight-normal">Replies within a few hours</h6>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Row-->
            <div class="row mb-6">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="float-left">
                                        <img src="https://zino.brhythym.com/images/logo-2.jpeg" style="height:80px;">
                                    </div>
                                    <div class="float-left ml-4">
                                        <img src="https://zino.brhythym.com/images/india-flag.jpg" style="width:30px;"> <span class="font-size-h3 font-weight-bold ml-1">Fourtunedesign</span>
                                        <span class="font-size-h3 font-weight-normal text-dark-50">@fourtunedesign</span>
                                        <p class="text-dark-50 font-size-h6 mt-2 mb-2">Web Designers, Web Developers, UX/UI Designers</p>
                                        <span title="Ratings" data-toggle="tooltip">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i> <span class="font-size-h6">4.9</span>
                                        </span>

                                        <span data-toggle="tooltip" title="Reviews">
                                        <i class="fab fa-rocketchat text-info ml-6"></i> <span class="font-size-h6">3044</span>
                                        </span>

                                        <span title="Money" data-toggle="tooltip"><span class="text-success font-size-h3 font-weight-bold ml-6">$</span> <span class="text-success font-weight-boldest"
                                            style="letter-spacing: 1px; position: relative; bottom: 2px;">||||||||<span class="text-muted">|</span></span> <span class="font-size-h6">9.1</span></span>

                                        <span data-toggle="tooltip" title="Completion Rate"><i class="fas fa-circle-notch text-primary ml-4 font-size-h4"></i> <span class="font-size-h6">94%</span></span>
                                    </div>
                                </div>

                                <div class="col-lg-4 text-right">
                                    <h3>$500.00 USD</h3>
                                    <h6>in 7 days</h6>
                                </div>

                                <div class="col-lg-12 mt-8">
                                    <h6>*******Website Redesign******</h6>
                                    <div class="font-size-lg mt-4">
                                        I have read your project. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="dots">...</span>
                                        <div class="more d-none">
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. <br /> It was popularised in the 1960s with the release of Letraset sheets containing
                                            <p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. I have read your project. Lorem Ipsum is simply dummy text
                                                of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            <p>Regards, <br /> Ahmad Ayaz</p>
                                        </div>
                                        <button class="btn btn-link p-0 readmore">Read More</button>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-right">
                                    <h6 class="text-dark-50 font-size-h6 font-weight-normal">Replies within a few hours</h6>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>



      
        <div class="tab-pane" id="tab_3" role="tabpanel">

            <div class="row">
                <div class="col-8">
                <div class="card card-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <ul class="nav flex-column nav-pills">
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" id="home-tab-5" data-toggle="tab" href="#starter-tab">
                                        <span class="nav-text">1. Starter</span>
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link" id="profile-tab-5" data-toggle="tab" href="#techstar-tab" aria-controls="profile">
                                        <span class="nav-text">2. Tech Star</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab-5" data-toggle="tab" href="#initiator-tab" aria-controls="contact">
                                        
                                        <span class="nav-text">3. Portfolio Initiator</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link portfolio_tab id="contact-tab-5" data-toggle="tab" href="#portfolio-tab" aria-controls="contact">
                                        
                                        <span class="nav-text">4. Portfolio</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab-5" data-toggle="tab" href="#ender-tab" aria-controls="contact">
                                        
                                        <span class="nav-text">5. Ender</span>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="col-8">
                            
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade show active" id="starter-tab" role="tabpanel" aria-labelledby="home-tab-5">
                                    <div class="scroll scroll-pull" data-scroll="true" style="height: 752px">
                                        @foreach($starters as $starter)
                                        <div>
                                            @if(strlen($starter->description) > 120)
                                            {{ substr($starter->description, 0, 120) }}<span class="dots">...</span><div class="more d-none">{{ substr($starter->description, 120) }}</div>
                                            <button class="btn btn-link p-0 readmore">Read More</button>
                                            @else
                                            {{ $starter->description }}
                                            @endif
                                        </div>
                                        <hr />
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="techstar-tab" role="tabpanel" aria-labelledby="profile-tab-5">
                                    <div class="scroll scroll-pull" data-scroll="true" style="height: 752px">
                                        @foreach($tech_stars as $tech_star)
                                        <div>
                                            @if(strlen($tech_star->description) > 120)
                                            {{ substr($tech_star->description, 0, 120) }}<span class="dots">...</span><div class="more d-none">{{ substr($tech_star->description, 120) }}</div>
                                            <button class="btn btn-link p-0 readmore">Read More</button>
                                            @else
                                            {{ $tech_star->description }}
                                            @endif
                                        </div>
                                        <hr />
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="initiator-tab" role="tabpanel" aria-labelledby="contact-tab-5">
                                    <div class="scroll scroll-pull" data-scroll="true" style="height: 752px">
                                        @foreach($portfolio_initiators as $portfolio_initiator)
                                        <div>
                                            @if(strlen($portfolio_initiator->description) > 120)
                                            {{ substr($portfolio_initiator->description, 0, 120) }}<span class="dots">...</span><div class="more d-none">{{ substr($portfolio_initiator->description, 120) }}</div>
                                            <button class="btn btn-link p-0 readmore">Read More</button>
                                            @else
                                            {{ $portfolio_initiator->description }}
                                            @endif
                                        </div>
                                        <hr />
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="portfolio-tab" role="tabpanel" aria-labelledby="contact-tab-5">
                                    <form method="get" id="portfolio_form" action="{{ route('admin.projects.details.get_portfolio_items') }}">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            
                                            <div class="form-group">
                                                <label class="font-weight-bold">Skills</label>
                                                <select style="width: 100%;" class="form-control select2 skills" name="skills[]" multiple="multiple">
                                                    @foreach($skills as $skill)
                                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Industry</label>
                                                <select style="width: 100%;" class="form-control select2 industry" name="industries[]" multiple>
                                                    @foreach($industries as $industry)
                                                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Type</label>
                                                <select style="width: 100%;" class="form-control select2 type" name="types[]" multiple>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- <button>Submit</button> --}}

                                        </div>
                                    

                                        <div class="col-lg-12 mt-6">
                                            <div class="form-group">
                                                <textarea style="line-height: 24px;" class="form-control related_items" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="tab-pane fade" id="ender-tab" role="tabpanel" aria-labelledby="contact-tab-5">
                                    <div class="scroll scroll-pull" data-scroll="true" style="height: 752px">
                                        @foreach($enders as $ender)
                                        <div>
                                            @if(strlen($ender->description) > 120)
                                            {{ substr($ender->description, 0, 120) }}<span class="dots">...</span><div class="more d-none">{{ substr($ender->description, 120) }}</div>
                                            <button class="btn btn-link p-0 readmore">Read More</button>
                                            @else
                                            {{ $ender->description }}
                                            @endif
                                        </div>
                                        <hr />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Starter</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">About</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tech Star</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Portfolio Initiator</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Portfolio</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Ender</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Days:</label>
                                        <input type="number" min="1" max="800" required placeholder="Enter Days" class="form-control">
                                    </div>
                                </div>
            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Budget:</label>
            
                                        <div class="input-group">
                                            <input type="number" min="1" max="99999999" required placeholder="Enter Budget" class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button">USD</button>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class=" tab-pane" id="tab_4" role="tabpanel">
            <div class="row mb-6">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="float-left">
                                        <img src="https://zino.brhythym.com/images/joe-alwyn.jpg" style="height:80px;">
                                    </div>
                                    <div class="float-left ml-4">
                                        <img src="https://zino.brhythym.com/images/pak-flag.png" style="width:30px;"> <span class="font-size-h3 font-weight-bold ml-1">Fullstack Developer</span>
                                        <span class="font-size-h3 font-weight-normal text-dark-50">@ahmadayaznoor</span>
                                        <p class="text-dark-50 font-size-h6 mt-2 mb-2">Laravel Wordpress Shopify Prestashop Magento PHP WIX UI/UX</p>

                                        <span title="Ratings" data-toggle="tooltip">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i> <span class="font-size-h6">5.0</span>
                                        </span>
                                        
                                        <span data-toggle="tooltip" title="Reviews"><i class="fab fa-rocketchat text-info ml-6"></i> <span class="font-size-h6">557</span></span>
                                        
                                        <span title="Money" data-toggle="tooltip"><span class="text-success font-size-h3 font-weight-bold ml-6">$</span> <span class="text-success font-weight-boldest" style="letter-spacing: 1px; position: relative; bottom: 2px;">|||||||<span class="text-muted">||</span></span><span class="font-size-h6">8.1</span></span>

                                        <span data-toggle="tooltip" title="Completion Rate"><i class="fas fa-circle-notch text-primary ml-4 font-size-h4"></i> <span class="font-size-h6">100%</span></span>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 text-right">
                                    <h3>$450.00 USD</h3>
                                    <h6 class="mb-2">2 days ago</h6>
                                    <span class="label font-weight-bold label-light-default label-inline label-xl">Rank: 10</span>
                                </div>

                                <div class="col-lg-12 mt-8">
                                    <div class="font-size-lg mt-4">
                                       <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.                                                        </P>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!--end::Section-->

@endsection

@section('page_partials')
@include('admin.projects.partials.bid-left-panel')
@endsection

@section('page_css')
<style>
    .related_sites:focus {
        outline: 0;
        border-color: #69b3ff;
    }
    
    .related_sites {
        border: 1px solid #e4e6ef;
    }
</style>
@endsection

@section('page_js')
<script>
    $(document).ready(function() {

        $(document).on('click','.readmore', function(){
            $(this).parent().find('.dots').removeClass("d-inline");
            $(this).parent().find('.dots').addClass("d-none");

            $(this).parent().find('.more').removeClass("d-none");
            $(this).parent().find('.more').addClass("d-inline");

            $(this).removeClass("readmore");
            $(this).addClass("readless");

            $(this).text("Read Less");
        });

        $(document).on('click','.readless', function(){
            $(this).parent().find('.dots').removeClass("d-none");
            $(this).parent().find('.dots').addClass("d-inline");

            $(this).parent().find('.more').removeClass("d-inline");
            $(this).parent().find('.more').addClass("d-none");

            $(this).removeClass("readless");
            $(this).addClass("readmore");

            $(this).text("Read More");
        });


        $('.portfolio_tab').on('click', function(){
            setTimeout(function(){
                $('.select2.industry').select2({
                    placeholder: "Please select industry",
                });

                $('.select2.type').select2({
                    placeholder: "Please select type",
                });

                $('.select2.skills').select2({
                    placeholder: "Please select skills",
                });
            }, 200);


            $(".select2.industry").change(function(){
                getPortfolioItems();
            });

            $(".select2.type").change(function(){
                getPortfolioItems();
            });

            $(".select2.skills").change(function(){
                getPortfolioItems();
            });


        });

        function getPortfolioItems(){
            
            let filters = $("#portfolio_form").serialize();
            let items_links = '';
            let counter = 1;
            
            $.ajax({
                method: 'get',
                url: "{{ route('admin.projects.details.get_portfolio_items') }}?"+filters,
                dataType: 'JSON',
                success: function(response){
                    //console.log(response);
                    if(response.status == 'success'){
                        
                        $(response.items).each(function(index, value) {
                            items_links += counter + '. ' + value.url + `
`;
                            counter++;
                        });
                        $(".related_items").val(items_links);
                    }else{
                        $(".related_items").val('');
                    }
                }
            });

        }

       // portfolio_form


    });
</script>
@endsection