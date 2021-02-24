@extends('admin.layouts.master')

@section('portfolio_nav', 'menu-item-open')
@section('portfolio_items_nav', 'menu-item-active')

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
                    <a href="{{ route('admin.portfolio.items.index') }}">Items</a>
                </li>
                <li class="breadcrumb-item">
                    Edit Item
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form id="edit_item_form" method="post" action="{{ route('admin.portfolio.items.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <input type="hidden" name="status" value="inactive">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Edit Item</h3>
                        </div>
                        <div class="card-toolbar">
                            <span class="switch switch-icon">
                            <span class="font-weight-bold">Status</span> <label class="ml-2">
                        <input type="checkbox" @if($item->status == 'active') checked="checked" @endif value="active" name="status">
                        <span></span>
                        </label>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Project Title*</label>
                                    <input value="{{ $item->name }}" placeholder="Please enter project name" type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group float-left w-100">
                                    <label class="font-weight-bold">Project URL*</label>
                                    <input value="{{ $item->url }}" placeholder="Please enter project URL" type="url" required name="url" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Industry*</label>
                                    <select required style="width: 100%;" class="form-control select2 industries" name="industries[]" multiple>
                                        @foreach($industries as $industry)
                                        <option @if(in_array($industry->id, $assigned_industries)) selected="selected" @endif value="{{ $industry->id }}">{{ $industry->name }}</option>
                                       @endforeach
                                    
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Type*</label>
                                    <select required style="width: 100%;" class="form-control select2 types" name="types[]" multiple>
                                        @foreach($types as $type)
                                        <option @if(in_array($type->id, $assigned_types)) selected="selected" @endif value="{{ $type->id }}">{{ $type->name }}</option>
                                       @endforeach
                                    
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Skills*</label>
                                    <select required style="width: 100%;" class="form-control select2 skills" name="skills[]" multiple="multiple">
                                        @foreach($skills as $skill)
                                        <option @if(in_array($skill->id, $assigned_skills)) selected="selected" @endif value="{{ $skill->id }}">{{ $skill->name }}</option>
                                       @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Project Details*</label>
                                    <textarea placeholder="Please enter details about project" required name="details" class="form-control" rows="4">{{ $item->details }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div>
                            <a href="{{ route('admin.portfolio.items.index') }}" class="btn btn-secondary font-weight-bold"><i class="flaticon2-reply"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i>Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Card-->
        </div>
    </div>

</div>
@endsection


@section('page_js')
<script>
    $('.select2.industries').select2({
        placeholder: "Please select industries",
    });
    $('.select2.types').select2({
        placeholder: "Please select types",
    });
    $('.select2.skills').select2({
        placeholder: "Please select skills",
    });

    // $("#edit_item_form").on("submit", function(e){
    //     e.preventDefault();
    //     toastr.success("Project updated successfully.", "Success");
    // });
</script>
@endsection