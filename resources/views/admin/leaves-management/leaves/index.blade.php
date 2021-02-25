@extends('admin.layouts.master')

@section('leaves_management_nav', 'menu-item-open')
@section('leaves_management_all_leaves_nav', 'menu-item-active')

@section("main")
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="row mb-6">
            <div class="col-lg-12">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                    </li>
                    
                    <li class="breadcrumb-item">
                        Leaves Management
                    </li>

                    <li class="breadcrumb-item">
                       All Leaves
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Leaves</h3>
                        </div>
                        <div class="card-toolbar">
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->

                        <form id="filter_form" method="get">
                            <input type="hidden" name="search" value="true">
                                <div class="row mb-8">
                                    <div calss="col-lg-2">
                                        <div class="col-lg-12 mb-2">
                                            <select name="user" style="max-width: 140px;" class="form-control select2 user">
                                                <option></option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div calss="col-lg-2">
                                        <div class="col-lg-12 mb-2">
                                            <select name="type" class="form-control select2 type">
                                                <option value="">Type</option>
                                                <option  value="short_leave">Short Leave</option>
                                                <option  value="half_day">Half Day</option>
                                                <option  value="full_day">Full Day</option>
                                                <option  value="multiple_days">Multiple Days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div calss="col-lg-2">
                                        <div class="col-lg-12 mb-2">
                                            <select name="status" class="form-control select2 status">
                                                <option value="">Status</option>
                                                <!-- <option  value="1">Pending</option> -->
                                                <option  value="accepted">Accepted</option>
                                                <option  value="rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>

                            
                                    <div class="col-lg-4 mb-2">
                                        <div class='input-group' id='kt_daterangepicker_6'>
                                            <input value="{{ $date_range }}" name="date_range" type='text' class="form-control" readonly="readonly" placeholder="Select date range" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary btn-primary--icon" id="kt_search">
                                            <span>
                                                <i class="la la-search"></i>
                                                <span>Search</span>
                                            </span>
                                        </button>&#160;&#160;

                                        @if(isset(request()->search))
                                        <a href="{{ route('admin.leaves_management.leaves.index') }}" id="kt_reset">
                                            <span>
                                                <i class="la la-close p-0"></i>
                                            </span>
                                        </a>
                                        @endif
                                                                        
                                    </div>
                                </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-separate table-head-custom table-checkable dataTable text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Date Applied</th>
                                        <th>Leave Date</th>
                                        <th>Status</th>
                                        <th data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaves as $leave)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $leave->user->name }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $leave->type)) }}</td>
                                        <td>{{ $leave->created_at }}</td>
                                        <td>
                                            @if($leave->type == 'short_leave' || $leave->type == 'half_day')
                                            {{ $leave->leave_date }} <br /> {{ $leave->leave_time_from }} To {{ $leave->leave_time_to }}
                                            @elseif($leave->type == 'full_day')
                                            {{ $leave->leave_date }}
                                            @elseif($leave->type == 'multiple_days')
                                            {{ $leave->leave_date_from }} To {{ $leave->leave_date_to }}
                                            <br />
                                            {{ daysDiff($leave->leave_date_from, $leave->leave_date_to) }} Days
                                            @endif
                                        </td>
                                        <td>
                                        @if($leave->status == 'pending')
                                        <span class="label font-weight-bold label-light-warning label-inline">Pending</span>
                                        @elseif($leave->status == 'accepted')
                                        <span class="label font-weight-bold label-light-success label-inline">Accepted</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Rejected</span>
                                        @endif
                                        </td>
                                        <td nowrap="nowrap">
                                            <a href="{{ route('admin.leaves_management.leaves.edit', $leave->id) }}" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

    </div>
@endsection


@section('page_vendor_css')
    <link rel="stylesheet" href="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

@section('page_vendor_js')
    <script src="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('page_js')
<script>
    $(document).ready(function(){
            $(".dataTable").dataTable({
                "aaSorting": []
            });

            $(".select2.user").select2({
                placeholder: "User"
            });

            $(".select2.status").select2({
                placeholder: "Status"
            });
            $(".select2.type").select2({
                placeholder: "Type"
            });

            //Change value of filters
            $("select[name='user']").val("{{ $user_id }}").change();
            $("select[name='status']").val("{{ $status }}").change();
            $("select[name='type']").val("{{ $type }}").change();

            $("#filter_form").on("submit", function(e){
                e.preventDefault();
                
                var user_val = $("select[name='user']").val();
                let status_val = $("select[name='status']").val();
                let type_val = $("select[name='type']").val();
                let date_range = $("input[name='date_range']").val();

                if(user_val == '' && status_val == '' && type_val == '' && date_range == ''){
                   return false;
                }

                e.currentTarget.submit();

            });
        });

        $('#kt_daterangepicker_6').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

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
</script>
@endsection