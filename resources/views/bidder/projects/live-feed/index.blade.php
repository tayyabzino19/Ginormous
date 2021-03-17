@extends('bidder.layouts.master')
@section('projects_nav', 'menu-item-open')
@section('projects_live_feed_nav', 'menu-item-active')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-6">
                <div class="col-lg-12">
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm float-left">

                        <li class="breadcrumb-item">
                            <a href="{{ route('bidder.index') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Projects
                        </li>
                        <li class="breadcrumb-item">
                            Live Feed
                        </li>
                        
                    </ul>

                    <a href="{{ route("bidder.projects.live_feed.get_live_feed") }}" data-toggle="tooltip" title="Load Projects" style="height: 32px; width: 32px;" class="btn btn-icon btn-warning btn-sm btn-circle btn-dropdown btn-lg mr-1 pulse pulse-light float-right">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <i class="ki ki-reload" style="font-size: 14px;"></i>
                        </span>
                        <span class="pulse-ring"></span>
                    </a>
                    
                    
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        @foreach($projects as $project)
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="javascript:;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                @if($project->type == 'fixed')
                                <span title="Fixed" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-primary font-weight-bolder">F</span>
                                @elseif($project->type == 'hourly')
                                <span title="Hourly" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-success font-weight-bolder">H</span>
                                @else
                                <span title="{{ ucwords($project->type) }}" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-warning font-weight-bolder">?</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <p class="font-weight-bolder mb-2">
                                <div class="float-left font-weight-bolder">
                                    {{ $project->title }}
                                    <br />
                                    <small class="text-muted font-weight-lighter">{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', $project->time_updated))->diffForHumans() }} </small>
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bolder">{{ $project->currency->sign }}{{ $project->budget->minimum }} - {{ $project->currency->sign }}{{ $project->budget->maximum }} ({{ $project->currency->code }})</span>
                                </div>
                                <div class="clearfix"></div>
                            </p>
                            <p class="text-dark-65">
                                {{ $project->preview_description }}
                            </p>
                            <hr />
                            <div class="row">
                                <div class="col-lg-5">
                                    {{ $project->bid_stats->bid_count }} <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">4.0</span> &nbsp;|&nbsp; 20 <strong class="text-warning">Reviews</strong>
                                </div>
                                <div class="col-lg-7">
                                    @if($project->upgrades->NDA)
                                        <span class="label label-inline label-info mb-1">NDA</span>
                                    @endif
                                    @if($project->upgrades->sealed)
                                    <span class="label label-inline label-primary mb-1">Sealed</span>
                                    @endif
                                    @if($project->upgrades->urgent)
                                    <span class="label label-inline label-danger mb-1">Urgent</span>
                                    @endif
                                    @if($project->upgrades->featured)
                                    <span class="label label-inline label-warning mb-1">Featured</span>
                                    @endif
                                    @if($project->upgrades->fulltime)
                                    <span class="label label-inline label-success mb-1">Fulltime</span>
                                    @endif
                                    {{-- <span class="label label-inline label-dark mb-1">Recruiter</span>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <button title="Miss It" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-danger mb-4 action_btn miss_it"><i class="fas fa-times"></i></button>
                                <br />
                                <br />
                                <br />
                                <br />
                                <button title="Bid Later" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-primary action_btn bid_later"><i class="far fa-clock"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>

        @endforeach
        
        
    
        {{-- <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="https://zino.brhythym.com/bidder/project/project-details.html">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <span title="Fixed" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-primary font-weight-bolder">F</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
    
                            <p class="font-weight-bolder mb-2">
                                <div class="float-left font-weight-bolder">
                                    Where does it come from
                                    <br />
                                    <small class="text-muted font-weight-lighter">2hrs ago</small>
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bolder">$100 - $200 (USD)</span>
                                </div>
                                <div class="clearfix"></div>
                            </p>
    
                            <p class="text-dark-65">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                ..
                            </p>
                            <hr />
                            <div class="row">
                                <div class="col-lg-5">
                                    10 <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">4.3</span> &nbsp;|&nbsp; 10 <strong class="text-warning">Reviews</strong>
                                </div>
                                <div class="col-lg-7">
                                    <span class="label label-inline label-dark mb-1">Recruiter</span>
                                    <span class="label label-inline label-warning mb-1">Featured</span>
                                    <span class="label label-inline label-primary mb-1">Sealed</span>
                                    <span class="label label-inline label-info mb-1">NDA</span>
                                    <span class="label label-inline label-danger mb-1">Urgent</span>
                                    <span class="label label-inline label-success mb-1">Fulltime</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <button title="Miss It" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-danger mb-4 action_btn miss_it"><i class="fas fa-times"></i></button>
                                <br />
                                <br />
                                <br />
                                <br />
                                <button title="Bid Later" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-primary action_btn bid_later"><i class="far fa-clock"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div> --}}
    </div>

    <div>
        {{ $projects->links() }}
    </div>
</div>
@endsection

@section('page_js')
<script>
    $(document).ready(function(){

        var baseUrl = "{{ url('') }}/files/click.wav";
        new Audio(baseUrl).load();

        $(".feed_card").click(function(e){
            if( $(e.target).closest(".action_btn").length < 1 ) {
                window.location = $(this).attr('data-link');   
            }
        });

        $(".action_btn.miss_it").on('click', function(){
            new Audio(baseUrl).play();
            var this_feed_card = $(this).parent().parent().parent().parent().parent();
            this_feed_card.addClass("animate__animated animate__backOutDown");
            setTimeout(function(){
                this_feed_card.addClass("d-none");
            }, 500);
        });

        $(".action_btn.bid_later").on('click', function(){
            new Audio(baseUrl).play();
            var this_feed_card = $(this).parent().parent().parent().parent().parent();
            this_feed_card.addClass("animate__animated animate__fadeOutTopLeft");
            setTimeout(function(){
                this_feed_card.addClass("d-none");
            }, 500);
        });

        
    })
</script>
@endsection