@extends('admin.layouts.master')

@section('helpers_nav', 'menu-item-open')
@section('helpers_tech_star_nav', 'menu-item-active')

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
                    Tech Star
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Tech Star</h3>
                    </div>
                    <div class="card-toolbar">
                        <button data-toggle="modal" data-target="#add_tech_star_modal" class="btn btn-primary"><i class="flaticon-add"></i>Add New</button>
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
                                @foreach($tech_stars as $tech_star)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>@if(strlen($tech_star->description) > 80) {{ substr($tech_star->description, 0, 80) }}.. @else {{ $tech_star->description }} @endif</td>
                                    <td><span class="label label-rounded label-light-primary">{{ $tech_star->copied_counter }}</span></td>
                                    <td>
                                        @if($tech_star->status == 'active')
                                        <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <button onclick="editTechStar({{ $tech_star->id }})" data-toggle="modal" data-target="#edit_tech_star_modal" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></button>
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
@include('admin.helpers.tech-star.partials.add-modal')
@include('admin.helpers.tech-star.partials.edit-modal')
@include('admin.helpers.tech-star.partials.delete-form')
@endsection


@section('page_js')
<script>
     function editTechStar(id){
        $.ajax({
                method: 'get',
                url: "{{ route('admin.helpers.tech_star.edit') }}/"+id,
                dataType: 'JSON',
                success: function(response){
                    //console.log(res);
                    if(response.status == 'success'){

                        $("#edit_tech_star_form input[name='id']").val(response.tech_star.id);
                        $("#edit_tech_star_form textarea[name='description']").val(response.tech_star.description);
                        if(response.tech_star.status == "active"){
                            $("#edit_tech_star_form input[value='active']").prop('checked', true);
                        }else{
                            $("#edit_tech_star_form input[value='active']").prop('checked', false);
                        }

                    }
                }
            });
    }

    $(".btn_delete_tech_star").on("click", function(){
        
        let id = $("#edit_tech_star_form input[name='id']").val();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#f64e60"
            }).then(function(result) {
                if (result.value) {

                    $("#tech_star_delete_from input[name='id']").val(id);
                    $("#tech_star_delete_from").submit();

                }
            });

    });
</script>
@endsection