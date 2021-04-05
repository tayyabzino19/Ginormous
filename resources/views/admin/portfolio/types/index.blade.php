@extends('admin.layouts.master')

@section('portfolio_nav', 'menu-item-open')
@section('portfolio_types_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Portfolio
                </li>
                <li class="breadcrumb-item">
                    Types
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Types</h3>
                    </div>
                    <div class="card-toolbar">
                        <button data-toggle="modal" data-target="#add_type_modal" class="btn btn-primary"><i class="flaticon-add"></i>Add New</button>
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
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($types as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td><span class="label label-rounded label-light-primary">{{ $type->items->count() }}</span></td>
                                    <td>
                                        @if($type->status == "active")
                                        <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <button onclick="editType({{ $type->id }})" data-toggle="modal" data-target="#edit_type_modal" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></button>
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

@section('page_partials')
@include('admin.portfolio.types.partials.add-modal')
@include('admin.portfolio.types.partials.edit-modal')
@endsection

@section('page_vendor_css')
    <link href="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page_vendor_js')
    <script src="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('page_js')
<script>
    $('.dataTable').dataTable({
        "aaSorting": []
    });

    function editType(id){
      
      $.ajax({
            method: 'get',
            url: "{{ route('admin.portfolio.types.edit') }}/"+id,
            dataType: 'JSON',
            success: function(response){
                //console.log(res);
                if(response.status == 'success'){
                    $("#edit_type_form input[name='id']").val(response.type.id);
                    $("#edit_type_form input[name='name']").val(response.type.name);
                    if(response.type.status == "active"){
                        $("#edit_type_form input[value='active']").prop('checked', true);
                    }else{
                        $("#edit_type_form input[value='active']").prop('checked', false);
                    }

                }else{
                    toastr.error("Something went wrong, Please try again", "Error");
                }
            }
        });
  }
</script>
@endsection