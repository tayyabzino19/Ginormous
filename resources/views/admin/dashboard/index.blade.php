@extends('admin.layouts.master')

@section('dashboard_nav', 'menu-item-active')

@section('main')
<div class="container">
    <div class="col-md-12">
        <form id="filter_form" method="get">
            <input type="hidden" name="search" value="true">
                <div class="mb-5 d-flex justify-content-center">
                    
                    <select name="user" style="max-width: 140px;" class="form-control select2 user">
                        <option></option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <div class="col-lg-4 mb-2">
                        <div class='input-group' id='kt_daterangepicker_6'>
                            <input readonly value="{{ $date_range }}" name="date_range" type='text' class="form-control" placeholder="Select date range" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div>
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
        </form>
    </div>
<div class="row">    
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

<div class="row mt-md-6">
    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-primary mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-primary"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Total</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">340</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>

    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-success mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-success"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Active</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">320</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>

    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-danger mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-danger"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Inactive</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">10</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>
</div>





<div class="row mt-md-6">

<div class="col-lg-4">
    <!--begin::List Widget 3-->
    <div class="card card-custom wave wave-primary card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title text-primary font-weight-bolder">Latest 5 Users</h3>
            <div class="card-toolbar">
                <i class="flaticon-users text-primary font-size-h3"></i>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 3-->
</div>


<div class="col-lg-8">
    <!--begin::List Widget 3-->
    <div class="card card-custom wave wave-warning card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title text-warning font-weight-bolder">Latest 5 Leaves Requests</h3>
            <div class="card-toolbar">
                <i class="flaticon-calendar-3 text-warning font-size-h3"></i>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            
            <table class="table borderless">
                <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>Leave Type</th>
                        <th>
                            View
                        </th>
                    </tr>

                </thead>
                <tbody>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                                                
                </tbody>
            </table>

        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 3-->
</div>

</div>
<!--end::Row-->

</div>

@endsection



@section('page_js')
<script>
    $(document).ready(function(){
        
        $(".select2.user").select2({
            placeholder: "User"
        });

        //Change value of filters
        $("select[name='user']").val("{{ $user_id }}").change();

        $("#filter_form").on("submit", function(e){
            e.preventDefault();
            let date_range = $("input[name='date_range']").val();
            var user_val = $("select[name='user']").val();
            if(date_range == '' || user_val == ''){
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


