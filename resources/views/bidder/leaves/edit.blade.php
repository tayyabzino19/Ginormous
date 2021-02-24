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
                   <a href="{{ route('bidder.leaves.index') }}">All Leaves</a>
                </li>

                <li class="breadcrumb-item">
                    View Leave
                 </li>
            </ul>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Leave Request Details</h3>
                    </div>
                    <div class="card-toolbar">
                        @if($leave->status == 'pending')
                        <span class="label font-weight-bold label-light-warning label-inline">Pending</span>
                        @elseif($leave->status == 'accepted')
                        <span class="label font-weight-bold label-light-success label-inline">Accepted</span>
                        @else
                        <span class="label font-weight-bold label-light-danger label-inline">Rejected</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="font-weight-bold mr-2">Leave Type:</label>
                                {{ ucwords(str_replace('_', ' ', $leave->type)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="font-weight-bold mr-2">Applied Date:</label>
                                {{ $leave->created_at }}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="font-weight-bold mr-2">Leave Date:</label>
                                @if($leave->type == 'short_leave' || $leave->type == 'half_day')
                                {{ $leave->leave_date }} {{ $leave->leave_time_from }} To {{ $leave->leave_time_to }}
                                @elseif($leave->type == 'full_day')
                                {{ $leave->leave_date }}
                                @elseif($leave->type == 'multiple_days')
                                {{ $leave->leave_date_from }} To {{ $leave->leave_date_to }}
                                ( {{ daysDiff($leave->leave_date_from, $leave->leave_date_to) }} Days )
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold mr-2">Reason:</label>
                            <p>{{ $leave->reason }}</p>
                        </div>
                    </div>

                    
                </div>

                <div class="card-footer text-right">
                    <a class="btn btn-secondary" href="{{ route('bidder.leaves.index') }}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection