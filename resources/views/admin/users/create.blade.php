@extends('admin.layouts.master')

@section('users_nav', 'menu-item-open')
@section('users_add_user_nav', 'menu-item-active')

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
                            Add User
                        </li>
                    </ul>
                </div>
            </div>

            <form id="profile_form" method="post" action="{{ route('admin.users.save') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="inactive">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="image-input image-input-empty " id="kt_user_edit_avatar" style="background-image: url({{ asset('images/default.png') }})">
                                            <div class="image-input-wrapper"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" required id="picture" name="picture" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="text-center text-danger picture_error font-size-xs"></div>
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
                                <input type="checkbox" checked="checked" value="active" name="status" />
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
                                            <input type="text" name="name" value="{{ old('name') }}" required class="form-control" placeholder="Enter name here">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email*</label>
                                            <input required type="email"  value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter email here">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Password</label>
                                            <input required pattern=".{8,}" title="8 characters minimum" type="password" name="password" class="form-control" placeholder="Eneter new password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Confirm Password</label>
                                            <input required pattern=".{8,}" title="8 characters minimum" type="password" name="password_confirmation" class="form-control" placeholder="Eneter new password again">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Designation*</label>
                                            <select required style="width: 100%;" class="form-control kt_select2_3_modal" name="designation_id">
                                            <option></option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-right">
                                        <a class="btn btn-secondary font-weight-bold" href="{{ route('admin.users.index') }}"><i class="flaticon2-reply"></i> Back</a>
                                        <button type="submit" class="btn btn-primary font-weight-bold btn_submit"><i style="font-size: 12px" class="flaticon2-check-mark"></i> Add</button>
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
    $(document).ready(function(){


        $(".btn_submit").on("click", function(){
            if($("#picture").get(0).files.length == 0){
                $(".picture_error").html("Please select a picture.");
            }else{
                $(".picture_error").html("");
            }
        });
        
        $("#picture").on('change', function(){
            $(".picture_error").html("");
        });

        $('.kt_select2_3_modal').select2({
                placeholder: "Please select a designation",
            });

            $("#profile_form").on('submit', function(e) {

                e.preventDefault();
                
                //Check email format
                var user_email = $("input[type='email']").val();
                if(validateEmail(user_email) == false){
                    toastr.error("Invalid email format.", "Error");
                    return false;
                }
                
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

        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

    });
</script>
@endsection


