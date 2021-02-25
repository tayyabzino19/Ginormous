@extends('admin.layouts.master')

@section('leaves_management_nav', 'menu-item-open')
@section('leaves_management_requests_nav', 'menu-item-active')

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
                       Requests
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Requests</h3>
                        </div>
                        <div class="card-toolbar">
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
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
                                        <td><span class="label font-weight-bold label-light-warning label-inline">Pending</span></td>
                                        <td nowrap="nowrap">
                                            <a href="{{ route('admin.leaves_management.requests.edit', $leave->id) }}" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></a>
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

    <!--end::Section-->
</div>
@endsection

@section('page_vendor_css')
<link href="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
    });
</script>
@endsection