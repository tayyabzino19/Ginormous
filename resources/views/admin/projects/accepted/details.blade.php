@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_accepted_nav', 'menu-item-active')

@section("main")
<div class="container" id="app">

<div class="row">
    <div class="col-lg-12">
        <div class="row mb-6">
            <div class="col-lg-12">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm float-left">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Projects
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.projects.accepted') }}">Accepted</a>
                    </li>
                    <li class="breadcrumb-item">
                        Details
                    </li>
                </ul>
                <div class="float-right">
                <a href="{{ route("common.sync_project_details", [$project->id, Auth()->user()->role]) }}" data-toggle="tooltip" title="Sync Details" style="height: 32px; width: 32px;" class="btn btn-icon btn-warning btn-sm btn-circle btn-dropdown btn-lg mr-1 pulse pulse-light">
                    <span class="svg-icon svg-icon-xl svg-icon-primary">
                        <i class="ki ki-reload" style="font-size: 14px;"></i>
                    </span>
                    <span class="pulse-ring"></span>
                </a>
                </div>
            </div>
        </div>
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
                {{-- <li class="nav-item mr-3">
                    <a class="nav-link" data-toggle="tab" href="#tab_3">
                        <span class="nav-text font-size-lg">Helper</span>
                    </a>
                </li> --}}
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

        <div class="mt-9">
            <b>Accepted At: </b> <span class="">{{ date('d M Y h:i:s A', strtotime($project->action_date)) }}</span>
        </div>

        {{-- <div class="card-title">
            <button onclick="markAsAccepted({{ $project->id }})" class="btn btn-primary"><i class="fa fa-check"></i>Mark as Accepted</button>
        </div> --}}

    </div>
    <!--end::Card header-->
    <!--begin::Card body-->

</div>

@php
$min_price = $project->currency->sign .  $project->budget->minimum;
if(!isset($project->budget->maximum)){
    $max_price = null;
}else{
    $max_price = ' - ' . $project->currency->sign .  $project->budget->maximum;
}
@endphp
<div class="tab-content">
    <!--begin::Tab-->
    <div class="tab-pane show active" id="tab_1" role="tabpanel">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="font-size-md text-dark-75 mt-2">
                                {{ $project->title }}
                                <br />
                                <small>
                                    <i style="font-size: 11px;" class="fa fa-clock"></i> {{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', $project->time_submitted))->diffForHumans() }}
                                </small>
                            </h5>
                        </div>
                        
                        <div class="card-toolbar">
                            <h6>{{$min_price}} {{$max_price}} ({{ $project->currency->code }})</h6>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <label class="font-weight-bold">Details:</label>
                                <p>
                                    {!! nl2br($project->ProjectDetail->description) !!}
                                </p>
                                @if($project->ProjectDetail->jobs)
                                <div class="mt-7">
                                    <label class="font-weight-bold">Skills:</label>
                                </div>
                                <p>
                                    @foreach($project->ProjectDetail->jobs as $job)
                                        <span class="label label-xl label-default label-inline mr-2 mb-2">{{ $job->name }}</span>
                                    @endforeach
                                </p>
                                @endif
                                @if($project->ProjectDetail->attachments)
                                <div class="mt-7">
                                    <label class="font-weight-bold">Attachments:</label>
                                </div>
                                <p>
                                    @foreach($project->ProjectDetail->attachments as $attachment)
                                    <a href="//{{ $attachment->url }}" target="_blank" class="btn btn-light-primary py-1 px-4">{{ $attachment->filename }}</a>
                                    @endforeach
                                </p>
                                @endif

                                <div class="text-right">
                                    Project ID: {{ $project->freelancer_project_id }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card card-custom card-stretch gutter-b">

                    <div class="card-body text-center">
                        <img style="width: 100px; height: 100px;" class="rounded-circle" src="{{ $project->ProjectDetail->employer_avatar_cdn }}">
                        <p class="font-weight-bold mt-4 font-size-h6 mb-0">{{ $project->ProjectDetail->employer_public_name }}<br />
                            <span class="font-weight-normal text-dark-50 font-size-md">{{ '@' . $project->ProjectDetail->employer_username }}</span>
                            <br />
                            <span class="font-weight-normal text-dark-50 font-size-sm">{{ $project->ProjectDetail->country->name }}</span> <img style="width: 18px;" src="{{ $project->ProjectDetail->country->flag_url_cdn }}"></p>
                        <div class="mt-1 mb-1 text-left mt-4">
                            <span class="inline-block font-size-sm">
                                {{ round($project->employer_reputation->overall, 1) }}

                                @for($i = 0; $i < round($project->employer_reputation->overall,0); $i++)
                                    <i class="fa fa-star text-warning font-size-xs"></i>
                                @endfor

                                @for($i = 5; $i > round($project->employer_reputation->overall,0); $i--)
                                    <i class="fa fa-star text-dark-30 font-size-xs"></i>
                                @endfor

                                 ({{ round($project->employer_reputation->reviews,0) }} Reviews)
                                </span>
                            <br />
                            <i class="fa fa-clock font-size-sm"></i> Member Since {{ date('M d Y', $project->ProjectDetail->registration_date) }}
                        </div>

                        <div class="text-left mt-4">
                            <h4 class="font-size-sm font-weight-bolder">Employer Verification</h4>
                            
                            @if($project->ProjectDetail->employer_status->identity_verified)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Identity verified
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Identity verified
                            @endif
                            <br />
                            @if($project->ProjectDetail->employer_status->payment_verified)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Payment method verified
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Payment method verified
                            @endif
                            <br />
                            @if($project->ProjectDetail->employer_status->deposit_made)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Deposite made
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Deposite made
                            @endif
                            <br />
                            @if($project->ProjectDetail->employer_status->email_verified)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Email address verified
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Email address verified
                            @endif
                            <br />
                            @if($project->ProjectDetail->employer_status->profile_complete)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Profile completed
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Profile completed
                            @endif
                            <br />
                            @if($project->ProjectDetail->employer_status->phone_verified)
                            <i class="fa fa-check-circle text-success font-size-sm"></i> Phone number verified
                            @else
                            <i class="fa fa-times-circle text-danger font-size-sm"></i> Phone number verified
                            @endif
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="tab-pane" id="tab_2" role="tabpanel">
        <!--begin::Row-->
        
        @foreach($project->ProjectProposals as $project_proposal)
            
        <div class="row mb-6">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="float-left">
                                            <img src="{{ $project_proposal->avatar_cdn }}" style="height:86px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <img src="{{ $project_proposal->country->highres_flag_url_cdn }}" style="width:30px;"> <span class="font-size-h3 font-weight-bold ml-1">{{ $project_proposal->public_name }}</span>
                                        <span class="font-size-h3 font-weight-normal text-dark-50">{{ '@' . $project_proposal->username }}</span>
                                        
                                        <p class="text-dark-50 font-size-h6 mt-2 mb-2">{{ $project_proposal->tagline  }}</p>
                                        
                                        <span title="Ratings" data-toggle="tooltip">
                                            
                                            @for($i = 0; $i < round($project_proposal->reputation->overall,0); $i++)
                                                <i class="fas fa-star text-warning"></i>
                                            @endfor

                                            @for($i = 5; $i > round($project_proposal->reputation->overall,0); $i--)
                                                <i class="fas fa-star text-dark-30"></i>
                                            @endfor
                                            
                                            <span class="font-size-h6">{{ round($project_proposal->reputation->overall, 1) }}</span>
                                        </span>
                                        
                                        <span data-toggle="tooltip" title="Reviews"><i class="fab fa-rocketchat text-info ml-6"></i> <span class="font-size-h6">{{ round($project_proposal->reputation->reviews,0) }}</span></span>
                                        
                                        <span title="Money" data-toggle="tooltip"><span class="text-success font-size-h3 font-weight-bold ml-6">$</span> <span class="text-success font-weight-boldest" style="letter-spacing: 1px; position: relative; bottom: 2px;">|||||||<span class="text-muted">||</span></span><span class="font-size-h6">8.1</span></span>

                                        <span data-toggle="tooltip" title="Completion Rate"><i class="fas fa-circle-notch text-primary ml-4 font-size-h4"></i> <span class="font-size-h6">{{ round(($project_proposal->reputation->completion_rate * 100) / 1) }}%</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-right">
                                <h3>{{ $project->currency->sign }}{{ $project_proposal->amount }} ({{ $project->currency->code }})</h3>
                                <h6>in {{ $project_proposal->period }} days</h6>
                            </div>

                            <div class="col-lg-12 mt-8">
                                <div class="font-size-lg mt-4">
                                    {!! nl2br($project_proposal->description) !!}
                                </div>
                            </div>

                            <div class="col-lg-12 text-right mt-6">
                                <h6 class="text-dark-50 font-size-h6 font-weight-normal">Replies within a few hours</h6>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endforeach


    </div>



  
    <div class="tab-pane" id="tab_3" role="tabpanel">

        <div class="row">
            <div class="col-8">
            <div class="card card-custom">
            {{-- For scroll
            class="scroll scroll-pull" data-scroll="true" style="height: 1000px" --}}
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
                                <a class="nav-link portfolio_tab" id="contact-tab-5" data-toggle="tab" href="#portfolio-tab" aria-controls="contact">
                                    
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
                                <div >
                                    @foreach($starters as $starter)
                                    <div>
                                        <i data-text="{{ $starter->description }}" class='fa fa-copy float-right position-absolute right-0 text-hover-dark-50 cursor-pointer btn_copy_starter'></i>
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
                                <div >
                                    @foreach($tech_stars as $tech_star)
                                    <div>
                                        <i data-text="{{ $tech_star->description }}" class='fa fa-copy float-right position-absolute right-0 text-hover-dark-50 cursor-pointer btn_copy_tech_star'></i>
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
                                <div >
                                    @foreach($portfolio_initiators as $portfolio_initiator)
                                    <div>
                                        <i data-text="{{ $portfolio_initiator->description }}" class='fa fa-copy float-right position-absolute right-0 text-hover-dark-50 cursor-pointer btn_copy_portfolio_initiator'></i>
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
                                <form id="portfolio_form">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        
                                        <div class="form-group">
                                            <label class="font-weight-bold">Skills</label>
                                            <select style="width: 100%;" class="form-control select2 skills" name="skills[]" multiple="multiple">
                                                @foreach($skills as $skill)
                                                    <option value="{{ $skill->freelancer_job_id }}">{{ $skill->name }}</option>
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
                                        
                                    </div>
                                

                                    <div class="col-lg-12 mt-6">
                                        <div class="form-group">
                                            <textarea v-model="portfolio" style="line-height: 24px;" class="form-control related_items" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                
                            </div>
                            <div class="tab-pane fade" id="ender-tab" role="tabpanel" aria-labelledby="contact-tab-5">
                                <div>
                                    @foreach($enders as $ender)
                                    <div>
                                        <i data-text="{{ $ender->description }}" class='fa fa-copy float-right position-absolute right-0 text-hover-dark-50 cursor-pointer btn_copy_ender'></i>
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
                                    <textarea class="form-control" rows="5" v-model="starter"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">About</label>
                                    <textarea class="form-control" rows="5" v-model="about"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tech Star</label>
                                    <textarea class="form-control" rows="5" v-model="tech_star"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Portfolio Initiator</label>
                                    <textarea class="form-control" rows="5" v-model="portfolio_initiator"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Portfolio</label>
                                    <textarea class="form-control" rows="5" v-model="portfolio"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Ender</label>
                                    <textarea class="form-control" rows="5" v-model="ender"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Days:</label>
                                    <input type="number" min="1" max="800" required placeholder="Enter Days" v-model="days" class="form-control">
                                </div>
                            </div>
        
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Budget:</label>
        
                                    <div class="input-group">
                                        <input type="number" min="{{ $project->budget->minimum }}" max="99999999" v-model="budget" required placeholder="Enter Budget" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button">{{ $project->currency->code }}</button>
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
                        
                        @foreach($our_proposals as $project_proposal)
                        <div class="row mb-6">
                            <div class="col-lg-12">
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="float-left">
                                                            <img src="{{ $project_proposal->avatar_cdn }}" style="height:86px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <img src="{{ $project_proposal->country->highres_flag_url_cdn }}" style="width:30px;"> <span class="font-size-h3 font-weight-bold ml-1">{{ $project_proposal->public_name }}</span>
                                                        <span class="font-size-h3 font-weight-normal text-dark-50">{{ '@' . $project_proposal->username }}</span>
                                                        
                                                        <p class="text-dark-50 font-size-h6 mt-2 mb-2">{{ $project_proposal->tagline  }}</p>
                                                        
                                                        <span title="Ratings" data-toggle="tooltip">
                                                            
                                                            @for($i = 0; $i < round($project_proposal->reputation->overall,0); $i++)
                                                                <i class="fas fa-star text-warning"></i>
                                                            @endfor

                                                            @for($i = 5; $i > round($project_proposal->reputation->overall,0); $i--)
                                                                <i class="fas fa-star text-dark-30"></i>
                                                            @endfor
                                                            
                                                            <span class="font-size-h6">{{ round($project_proposal->reputation->overall, 1) }}</span>
                                                        </span>
                                                        
                                                        <span data-toggle="tooltip" title="Reviews"><i class="fab fa-rocketchat text-info ml-6"></i> <span class="font-size-h6">{{ round($project_proposal->reputation->reviews,0) }}</span></span>
                                                        
                                                        <span title="Money" data-toggle="tooltip"><span class="text-success font-size-h3 font-weight-bold ml-6">$</span> <span class="text-success font-weight-boldest" style="letter-spacing: 1px; position: relative; bottom: 2px;">|||||||<span class="text-muted">||</span></span><span class="font-size-h6">8.1</span></span>

                                                        <span data-toggle="tooltip" title="Completion Rate"><i class="fas fa-circle-notch text-primary ml-4 font-size-h4"></i> <span class="font-size-h6">{{ round(($project_proposal->reputation->completion_rate * 100) / 1) }}%</span></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 text-right">
                                                <h3>{{ $project->currency->sign }}{{ $project_proposal->amount }} ({{ $project->currency->code }})</h3>
                                                <h6>in {{ $project_proposal->period }} days</h6>
                                            </div>

                                            <div class="col-lg-12 mt-8">
                                                <div class="font-size-lg mt-4">
                                                    {!! nl2br($project_proposal->description) !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-12 text-right mt-6">
                                                <h6 class="text-dark-50 font-size-h6 font-weight-normal">Replies within a few hours</h6>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
{{-- @include('bidder.projects.partials.bid-later-bid-left-panel') --}}
</div>

<!--end::Section-->
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


function markAsAccepted(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Proceed!",
        confirmButtonColor: "#1bc5bd"
    }).then(function(result) {
        if (result.value) {
            window.open("{{ route('admin.projects.replied.mark_as_accepted') }}/"+id, "_self");
        }
    });
}

$(document).ready(function() {
    //readmore functionality
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

            //set skills
            @if(count($project->ProjectDetail->jobs))
                $(".select2.skills").val({{collect($project->ProjectDetail->jobs)->pluck('id')}}).trigger("change")
            @endif

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
            url: "{{ route('common.filter_portfolio_items') }}?"+filters,
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
                    app.portfolio = items_links;

                }else{
                    $(".related_items").val('');
                    app.portfolio = '';
                }
            }
        });

    }

});
</script>
<script src="{{ asset('extensions/vue.js') }}"></script>
<script>
var app = new Vue({
    el: "#app",
    data: {
        starter: '',
        about: '',
        tech_star: '',
        portfolio_initiator: '',
        portfolio: '',
        ender: '',
        days: '',
        budget: '',
        redirect_path: "{{ route('admin.projects.bidded') }}"
    }
});

$(".btn_copy_starter").on("click", function(){
    let text = $(this).attr('data-text');
    app.starter = text;
});
$(".btn_copy_tech_star").on("click", function(){
    let text = $(this).attr('data-text');
    app.tech_star = text;
});
$(".btn_copy_portfolio_initiator").on("click", function(){
    let text = $(this).attr('data-text');
    app.portfolio_initiator = text;
});
$(".btn_copy_ender").on("click", function(){
    let text = $(this).attr('data-text');
    app.ender = text;
});

</script>
@endsection


