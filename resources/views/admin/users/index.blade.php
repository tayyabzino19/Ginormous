@extends('admin.layouts.master')

@section('users_nav', 'menu-item-open')
@section('users_all_users_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Users
                </li>
                <li class="breadcrumb-item">
                    All Users
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Users</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="flaticon-add"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Last Logged In</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->designation->name }}</td>
                                    <td>
                                        @if($user->status == "active")
                                            <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                            <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>

                                    <td>{{ $user->last_logged_in }}</td>
                                    <td nowrap="nowrap">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" title="View" data-toggle="tooltip" class="btn btn-sm btn-icon btn-light-primary mr-1"><i class="far fa-eye"></i></button>
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
       
        $('.dataTable').dataTable({
            "aaSorting": []
        });
    });
    
</script>
@endsection