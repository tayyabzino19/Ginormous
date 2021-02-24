@extends('bidder.layouts.master')

@section('leaves_nav', 'menu-item-open')
@section('leaves_all_leaves_nav', 'menu-item-active')

@section('main')
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('bidder.index') }}"><i class="fa fa-home"></i></a>
                </li>
                
                <li class="breadcrumb-item">
                    Leaves
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
                        <a href="{{ route('bidder.leaves.create') }}" class="btn btn-primary"><i class="flaticon-add"></i>Request a Leave</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable dataTable text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                        <a href="{{ route('bidder.leaves.edit', $leave->id) }}" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></a>
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
    });
</script>
@endsection