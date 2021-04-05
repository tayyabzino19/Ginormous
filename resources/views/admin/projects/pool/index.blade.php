@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_pool_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12 d-flex justify-content-between">

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Projects
                </li>
                <li class="breadcrumb-item">
                    Pool
                </li>
            </ul>

            <div class="mt-2">
                <b>Total:</b> {{ number_format($projects->total()) }}</div>
        </div>
        
    </div>
    <form id="filter_form" method="get">
        <input type="hidden" name="search" value="true">
        <div class="d-flex justify-content-center">
            <div class="">
            <input type="text" class="form-control" value="{{ $project_title }}" name="title" placeholder="Project Title">
            </div>
            <div class="">
                <select name="user" style="max-width: 140px;" class="form-control select2 user">
                    <option></option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <div class='input-group' id='kt_daterangepicker_6'>
                    <input readonly value="{{ $date_range }}" name="date_range" type='text' class="form-control" placeholder="Select date range" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary"><i class="la la-filter"></i> Filter
                </button>&#160;&#160;

                @if(isset(request()->search))
                <a href="{{ route('admin.projects.pool') }}" id="kt_reset">
                    <span>
                        <i class="la la-close p-0"></i>
                    </span>
                </a>
                @endif                               
            </div>
        </div>
    </form>

    <div class="row mt-6">

        @foreach($projects as $project)
        @php
            if(!isset($project->budget->maximum)){
                $max = "...";
            }else{
                $max = $project->budget->maximum;
            }
        @endphp
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="{{ route('admin.projects.pool.details', $project->id) }}">
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
                                <div class="symbol symbol-circle symbol-lg-35" data-toggle="tooltip" data-html="true" title="<b>Pool of:</b> {{ $project->user->name }}">
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
                                    {{ $project->bid_stats->bid_count }} <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">{{ round($project->reputation->overall, 1) }}</span> &nbsp;|&nbsp; <strong class="text-warning">{{ round($project->reputation->reviews,0) }} Reviews</strong>
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

        //Search start
        $(".select2.user").select2({
            placeholder: "User"
        });

        //Change value of filters
        $("select[name='user']").val("{{ $user_id }}").change();

        $("#filter_form").on("submit", function(e){
            e.preventDefault();
            let date_range = $("input[name='date_range']").val();
            let title_val = $("input[name='title']").val();
            var user_val = $("select[name='user']").val();
            if(date_range == '' && user_val == '' && title_val == ''){
                return false;
            }
            e.currentTarget.submit();
        });
        
        $('#kt_daterangepicker_6').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            //startDate: "moment().subtract(1, 'days')",
            endDate: "moment().subtract(1, 'days')",

            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#kt_daterangepicker_6 .form-control').val( start.format('DD-MMM-YYYY') + ' to ' + end.format('DD-MMM-YYYY'));
            
        });
        //serach ends

        $(".feed_card").click(function(e){
            if( $(e.target).closest(".action_btn").length < 1 ) {
                window.location = $(this).attr('data-link');   
            }
        });
    })
</script>
@endsection