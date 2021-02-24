@extends('admin.layouts.master')

@section('helpers_nav', 'menu-item-open')
@section('helpers_ender_nav', 'menu-item-active')

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
                    Ender
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Ender</h3>
                    </div>
                    <div class="card-toolbar">
                        <button data-toggle="modal" data-target="#add_ender_modal" class="btn btn-primary"><i class="flaticon-add"></i>Add New</button>
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
                                @foreach($enders as $ender)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>@if(strlen($ender->description) > 80) {{ substr($ender->description, 0, 80) }}.. @else {{ $ender->description }} @endif</td>
                                    <td><span class="label label-rounded label-light-primary">16</span></td>
                                    <td>
                                        @if($ender->status == 'active')
                                        <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <button onclick="editEnder({{ $ender->id }})" data-toggle="modal" data-target="#edit_ender_modal" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></button>
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

@section('page_partials')
@include('admin.helpers.ender.partials.add-modal')
@include('admin.helpers.ender.partials.edit-modal')
@include('admin.helpers.ender.partials.delete-form')
@endsection


@section('page_js')
<script>
     function editEnder(id){
        $.ajax({
                method: 'get',
                url: "{{ route('admin.helpers.ender.edit') }}/"+id,
                dataType: 'JSON',
                success: function(response){
                    //console.log(res);
                    if(response.status == 'success'){

                        $("#edit_ender_form input[name='id']").val(response.ender.id);
                        $("#edit_ender_form textarea[name='description']").val(response.ender.description);
                        if(response.ender.status == "active"){
                            $("#edit_ender_form input[value='active']").prop('checked', true);
                        }else{
                            $("#edit_ender_form input[value='active']").prop('checked', false);
                        }

                    }
                }
            });
    }

    $(".btn_delete_ender").on("click", function(){
        
        let id = $("#edit_ender_form input[name='id']").val();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#f64e60"
            }).then(function(result) {
                if (result.value) {

                    $("#ender_delete_from input[name='id']").val(id);
                    $("#ender_delete_from").submit();

                }
            });

    });
</script>
@endsection