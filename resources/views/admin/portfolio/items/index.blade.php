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
                    Items
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Items</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.portfolio.items.create') }}" class="btn btn-primary"><i class="flaticon-add"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">
                        <table class="table table-separate table-head-custom table-checkable dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Skills</th>
                                    <th>Industries</th>
                                    <th>Types</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($item->status == 'active')
                                        <i title="Active" data-toggle="tooltip" class="fas fa-check-circle text-success"></i>
                                        @else
                                        <i title="Inactive" data-toggle="tooltip" class="fas fa-times-circle text-danger"></i>
                                        @endif
                                        {{ $item->name }}
                                    </td>
                                    <td><span class="label label-rounded label-light-primary cursor_alias" data-toggle="tooltip" title="@foreach($item->skills as $skill) {{ $skill->name }}@if(!$loop->last), @endif @endforeach">{{ $item->skills->count() }}</span></td>
                                    <td><span class="label label-rounded label-light-primary cursor_alias" data-toggle="tooltip" title="@foreach($item->industries as $industry) {{ $industry->name }}@if(!$loop->last), @endif @endforeach">{{ $item->industries->count() }}</span></td>
                                    <td><span class="label label-rounded label-light-primary cursor_alias" data-toggle="tooltip" title="@foreach($item->types as $type) {{ $type->name }}@if(!$loop->last), @endif @endforeach">{{ $item->types->count() }}</span></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td nowrap="nowrap">
                                        <a href="{{ route('admin.portfolio.items.edit', $item->id) }}" title="View" data-toggle="tooltip" class="btn btn-sm btn-icon btn-light-primary mr-1"><i class="far fa-eye"></i></button>
                                        <a title="View Project" data-toggle="tooltip" class="btn btn-sm btn-icon btn-light-primary" href="{{ $item->url }}" target="_blank"><i class="fas fa-globe"></i></a>
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
    $('.dataTable').dataTable({
        "aaSorting": []
    });
</script>
@endsection