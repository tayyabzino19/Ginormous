@extends('admin.layouts.master')

@section('helpers_nav', 'menu-item-open')
@section('helpers_starter_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Helpers
                </li>
                <li class="breadcrumb-item">
                    Starter
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Starter</h3>
                    </div>
                    <div class="card-toolbar">
                        <button data-toggle="modal" data-target="#add_starter_modal" class="btn btn-primary"><i class="flaticon-add"></i>Add New</button>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="350">Description</th>
                                    <th>Copied</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($starters as $starter)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>@if(strlen($starter->description) > 80) {{ substr($starter->description, 0, 80) }}.. @else {{ $starter->description }} @endif</td>
                                    <td><span class="label label-rounded label-light-primary">16</span></td>
                                    <td>
                                        @if($starter->status == 'active')
                                        <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <button onclick="editStarter({{ $starter->id }})" data-toggle="modal" data-target="#edit_starter_modal" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></button>
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
@include('admin.helpers.starter.partials.add-modal')
@include('admin.helpers.starter.partials.edit-modal')
@include('admin.helpers.starter.partials.delete-form')
@endsection

@section('page_js')
<script>
     function editStarter(id){
        $.ajax({
                method: 'get',
                url: "{{ route('admin.helpers.starter.edit') }}/"+id,
                dataType: 'JSON',
                success: function(response){
                    //console.log(res);
                    if(response.status == 'success'){

                        $("#edit_starter_form input[name='id']").val(response.starter.id);
                        $("#edit_starter_form textarea[name='description']").val(response.starter.description);
                        if(response.starter.status == "active"){
                            $("#edit_starter_form input[value='active']").prop('checked', true);
                        }else{
                            $("#edit_starter_form input[value='active']").prop('checked', false);
                        }

                    }else{
                        
                    }
                }
            });
    }

    $(".btn_delete_starter").on("click", function(){
        let id = $("#edit_starter_form input[name='id']").val();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#f64e60"
            }).then(function(result) {
                if (result.value) {

                    $("#starter_delete_from input[name='id']").val(id);
                    $("#starter_delete_from").submit();

                }
            });

    });
</script>
@endsection
