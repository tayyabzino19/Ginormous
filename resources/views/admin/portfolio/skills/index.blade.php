@extends('admin.layouts.master')

@section('portfolio_nav', 'menu-item-open')
@section('portfolio_skills_nav', 'menu-item-active')

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
                    Skills
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Skills</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route("admin.portfolio.skills.sync") }}" data-toggle="tooltip" title="Sync Skills" style="height: 32px; width: 32px;" class="btn btn-icon btn-warning btn-sm btn-circle btn-dropdown btn-lg mr-1 pulse pulse-light">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <i class="ki ki-reload" style="font-size: 14px;"></i>
                            </span>
                            <span class="pulse-ring"></span>
                        </a>
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
                                    <th>Freelancer job ID</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($skills as $skill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->freelancer_job_id }}</td>
                                    <td><span class="label label-rounded label-light-primary">{{ $skill->items->count() }}</span></td>
                                    <td>
                                        @if($skill->status == "active")
                                        <span class="label font-weight-bold label-light-success label-inline">Active</span>
                                        @else
                                        <span class="label font-weight-bold label-light-danger label-inline">Inactive</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <button onclick="editSkill({{ $skill->id }})" data-toggle="modal" data-target="#edit_skill_modal" class="btn btn-sm btn-icon btn-light-primary mr-2"><i title="View" data-toggle="tooltip" class="far fa-eye"></i></button>
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
@include('admin.portfolio.skills.partials.edit-modal')
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

    function editSkill(id){
      
      $.ajax({
            method: 'get',
            url: "{{ route('admin.portfolio.skills.edit') }}/"+id,
            dataType: 'JSON',
            success: function(response){
                //console.log(res);
                if(response.status == 'success'){

                    $("#edit_skill_form input[name='id']").val(response.skill.id);
                    $("#edit_skill_form input[name='name']").val(response.skill.name);
                    $("#edit_skill_form input[name='freelancer_job_id']").val(response.skill.freelancer_job_id);
                    if(response.skill.status == "active"){
                        $("#edit_skill_form input[value='active']").prop('checked', true);
                    }else{
                        $("#edit_skill_form input[value='active']").prop('checked', false);
                    }

                }else{
                    
                }
            }
        });
  }
</script>
@endsection