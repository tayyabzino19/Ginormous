@extends('admin.layouts.master')

@section('users_nav', 'menu-item-open')
@section('users_all_users_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="row mb-6">
                <div class="col-lg-12">
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.users.index') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item">
                            Edit User
                        </li>
                    </ul>
                </div>
            </div>

            <form id="profile_form" method="post" action="{{ route('admin.users.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="status" value="inactive">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="image-input image-input-empty " id="kt_user_edit_avatar" style="background-image: url({{ route('image_source', ['user', $user->picture]) }})">
                                            <div class="image-input-wrapper"></div>
                                        </div>
                                        <h6 class="mt-5">{{ $user->name }}</h6>
                                        <p class="text-primary font-weight-bold mb-2">{{ $user->designation->name }}</p>
                                        <p> {{ $user->created_at }} </p>
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
                                    <span class="switch switch-icon">
                                    <span class="font-weight-bold">Status</span> <label class="ml-2">
                                <input type="checkbox" @if($user->status == 'active') checked="checked" @endif value="active" name="status" />
                                <span></span>
                                </label>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Full Name*</label>
                                            <input type="text" name="name" required value="{{ old('name', $user->name) }}" class="form-control" placeholder="Enter name here">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email*</label>
                                            <input readonly type="text" name="email" required value="{{ old('email', $user->email) }}" class="form-control" placeholder="Enter email here">
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

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Designation*</label>
                                            <select required style="width: 100%;" class="form-control kt_select2_3_modal" name="designation_id">
                                            <option></option>
                                            @foreach($designations as $designation)
                                                <option @if($designation->id == $user->designation_id) selected='selected' @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-right">
                                        <a class="btn btn-secondary font-weight-bold" href="{{ route('admin.users.index') }}"><i class="flaticon2-reply"></i> Back</a>
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

@section('page_js')
<script>
    $(document).ready(function(){

        $('.kt_select2_3_modal').select2({
            placeholder: "Please select a designation",
        });

        $("#profile_form").on('submit', function(e) {

            e.preventDefault();
            
            //password confirmation check
            let password = $("input[name='password']");
            if (password.val() != "") {

                let password_confirmation = $("input[name='password_confirmation']");
                if (password_confirmation.val() != password.val()) {
                    toastr.error("The password confirmation does not match", "Error");
                    return false;
                }
            }

            e.currentTarget.submit();
            //toastr.success("Your profile has been successfully created.", "Success");
        });

    });
</script>
@endsection


