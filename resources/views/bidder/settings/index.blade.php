@extends('bidder.layouts.master')


@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="row mb-6">
                <div class="col-lg-12">
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                        <li class="breadcrumb-item">
                            <a href="{{ route('bidder.index') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Settings
                        </li>
                    </ul>
                </div>
            </div>

            <form id="setting_form" method="post" action="{{ route('bidder.settings.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-3">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="image-input image-input-empty " id="kt_user_edit_avatar" style="background-image: url({{ route('image_source', ['user', $user->picture]) }})">
                                            <div class="image-input-wrapper"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="picture" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <h6 class="mt-5 mb-4">{{ $user->name }}</h6>
                                        <p class="text-primary font-weight-bold">{{ $user->designation->name }}</p>
                                        <p class="text-muted">9:00am - 5:00pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Personal Settings</h3>
                                </div>
                                <div class="card-toolbar">
                                    <i class="flaticon-settings"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Full Name*</label>
                                            <input type="text" name="name" required value="{{ $user->name }}" class="form-control" placeholder="Enter name here">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email*</label>
                                            <input readonly type="text" name="email" required value="{{ $user->email }}" class="form-control" placeholder="Enter email here">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Password</label>
                                            <input pattern=".{8,}" title="8 characters minimum" type="password" name="password" class="form-control" placeholder="Eneter new password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Confirm Password</label>
                                            <input pattern=".{8,}" title="8 characters minimum" type="password" name="password_confirmation" class="form-control" placeholder="Eneter new password again">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i> Update</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('page_vendor_js')
<script src="{{ asset('metronic/dist/assets/js/pages/custom/user/edit-user.js') }}"></script>
@endsection

@section('page_js')
<script>
    $(document).ready(function() {

        $("#setting_form").on('submit', function(e) {
            e.preventDefault();

            //password confirmation check
            let password = $("input[name='password']");
            if (password.val() != "") {

                let password_confirmation = $("input[name='password_confirmation']");
                if (password_confirmation.val() != password.val()) {
                    toastr.error("The password confirmation does not match");
                    return false;
                }
            }
            e.currentTarget.submit();
            //toastr.success("Your profile has been updated successfully.", "Success");
        });

    });
</script>
@endsection