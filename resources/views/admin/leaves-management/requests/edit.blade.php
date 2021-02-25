@extends('admin.layouts.master')

@section('leaves_management_nav', 'menu-item-open')
@section('leaves_management_requests_nav', 'menu-item-active')

@section("main")
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
                   <a href="{{ route('admin.leaves_management.requests.index') }}">Requests</a>
                </li>

                <li class="breadcrumb-item">
                    Request View
                 </li>
            </ul>
        </div>
    </div>

    

    <div class="row">

        <div class="col-lg-3">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">User Details</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="image-input image-input-empty " id="kt_user_edit_avatar" style="background-image: url({{ route('image_source', ['user', $leave->user->picture]) }})">
                                <div class="image-input-wrapper"></div>
                            </div>
                            <h6 class="mt-5">{{ $leave->user->name }}</h6>
                            <p class="text-primary font-weight-bold mb-2">{{ $leave->user->designation->name }}</p>
                            <p>{{ $leave->user->created_at }}</p>

                            <!-- <a class="btn btn-light-primary pr-2 btn-sm"><i class="far fa-eye"></i></a> -->
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Leave Request Details</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="label font-weight-bold label-light-warning label-inline">Pending</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="font-weight-bold mr-2">Name:</label>
                                {{ $leave->user->name }}
                            </div>
                        </div>
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
                                {{ daysDiff($leave->leave_date_from, $leave->leave_date_to) }} Days
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

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-light-danger" onclick="rejectRequest({{ $leave->id }})"><i class="flaticon2-cancel" style="font-size: 10px;"></i>Reject</button>
                            <button class="btn btn-light-success" onclick="acceptRequest({{ $leave->id }})"><i class="flaticon2-check-mark" style="font-size: 12px;"></i>Accept</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection

@section('page_partials')
@include('admin.leaves-management.requests.partials.accept-form')
@include('admin.leaves-management.requests.partials.reject-form')
@endsection

@section('page_js')
<script>
    function rejectRequest(id){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Reject it!",
            confirmButtonColor: "#f64e60"
        }).then(function(result) {
            if (result.value) {

                $("#request_reject_form input[name='id']").val(id);
                $("#request_reject_form").submit();
            }
        });
    }

    function acceptRequest(id){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Accept it!",
            confirmButtonColor: "#1bc5bd"
        }).then(function(result) {
            if (result.value) {

                $("#request_accept_form input[name='id']").val(id);
                $("#request_accept_form").submit();
            }
        });
    }
    
</script>
@endsection