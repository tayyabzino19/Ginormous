@extends('bidder.layouts.master')
@section('dashboard_nav', 'menu-item-active')

@section('main')
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <form id="filter_form" method="get">
                <input type="hidden" name="search" value="true">


                <div class="d-flex justify-content-between">
                    
                    <div>
                        <h6 class="mt-3">This Month Bonus: <span class="text-success">{{ number_format($this_month_project_accepted_count * Auth::user()->designation->bonus_amount) }}</span></h6>
                    </div>

                    <div class="mb-5 d-flex justify-content-end">
                        <div class="mr-4">
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
                            <button type="submit" class="btn btn-primary btn-primary--icon" id="kt_search">
                                <span>
                                    <i class="la la-filter"></i>
                                    <span>Filter</span>
                                </span>
                            </button>&#160;&#160;

                            @if(isset(request()->search))
                            <a href="{{ route('bidder.index') }}" id="kt_reset">
                                <span>
                                    <i class="la la-close p-0"></i>
                                </span>
                            </a>
                            @endif
                                                            
                        </div>
                    </div>

                </div>


            </form>
        </div>
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-primary"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Bidded</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $project_bidded_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-success"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Accepted</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $project_accepted_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-danger"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Missed</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $project_missed_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-warning"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-warning font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Replied</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $project_replied_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        
    </div>

    <div class="row mt-md-6">
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-primary"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Total</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $leave_total_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-success"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Accepted</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $leave_accepted_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-danger"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Rejected</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $leave_rejected_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-warning"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-warning font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Pending</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">{{ $leave_pending_count }}</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        
    </div>
</div>
@endsection


@section('page_js')
<script>
    $(document).ready(function(){
        $("#filter_form").on("submit", function(e){
            e.preventDefault();
            let date_range = $("input[name='date_range']").val();
            if(date_range == ''){
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
    });
</script>
@endsection