@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_bid_later_nav', 'menu-item-active')

@section("main")
<div class="container">
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
                    Bid Later
                </li>
            </ul>
            <div class="float-right mt-2 mr-2"><b>Total:</b> {{ number_format($projects->total()) }}</div>
        </div>
    </div>

    <div class="row">

        @foreach($projects as $project)
        @php
            if(!isset($project->budget->maximum)){
                $max = "...";
            }else{
                $max = $project->budget->maximum;
            }
        @endphp
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="{{ route('admin.projects.bid_later.details', $project->id) }}">
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
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="symbol symbol-circle symbol-lg-35" data-toggle="tooltip" data-html="true" title="<b>Bid Later By:</b> {{ $project->user->name }}">
                                    <img src="{{ route('image_source', ['user', $project->user->picture]) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <p class="font-weight-bolder mb-2">
                                <div class="float-left font-weight-bolder">
                                    {{ $project->title }}
                                    <br />
                                    <small class="text-muted font-weight-lighter">{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', $project->time_submitted))->diffForHumans() }} </small>
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bolder">{{ $project->currency->sign }}{{ $project->budget->minimum }} - {{ $project->currency->sign }}{{ $max }} ({{ $project->currency->code }})</span>
                                </div>
                                <div class="clearfix"></div>
                            </p>
                            <p class="text-dark-65">
                                {{ $project->preview_description }}
                            </p>
                            <hr />
                            <div class="row">
                                <div class="col-lg-5">
                                    {{ $project->bid_stats->bid_count }} <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">{{ round($project->employer_reputation->overall, 1) }}</span> &nbsp;|&nbsp; <strong class="text-warning">{{ round($project->employer_reputation->reviews,0) }} Reviews</strong>
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
                               
                                <a href="https://www.freelancer.com/projects/{{$project->seo_url}}" title="Open in Web" target="_blank" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-info action_btn"><i class="fas fa-globe"></i></a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>

        @endforeach
    </div>

    <div>
        {{ $projects->links() }}
    </div>


</div>

@endsection

@section('page_js')

@section('page_css')
<style>
    .feed_card{
        cursor: pointer;
    }
</style>
@endsection

<script>
    $(document).ready(function(){

        $(".feed_card").click(function(e){
            if( $(e.target).closest(".action_btn").length < 1 ) {
                window.location = $(this).attr('data-link');   
            }
        });
    })
</script>
@endsection