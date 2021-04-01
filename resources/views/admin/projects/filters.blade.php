@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_filters_setting_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Projects
                </li>
                <li class="breadcrumb-item">
                    Filters Setting
                </li>
            </ul>
        </div>
    </div>


    <div class="row">
                            
        <div class="col-lg-12">
            <form id="filter_form" method="post" action="{{ route('admin.projects.filters.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $project_filter->id }}">
                <input type="hidden" name="project_type_fixed" value="0">
                <input type="hidden" name="project_type_hourly" value="0">
                @foreach($project_filter->listing_type as $type => $is_true)
                <input type="hidden" name="listing_type[{{ $type }}]" value="0">
                @endforeach


            <div class="card card-custom">
               
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Filters Setting</h3>
                    </div>
                    <div class="card-toolbar">
                        <i class="flaticon-settings"></i>
                    </div>
                </div>
                
                <div class="card-body">
                    
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="font-weight-bold">Project Type</label>
                                    <div class="checkbox-list">
                                        <label class="checkbox mb-2">
                                <input @if($project_filter->project_type->fixed) checked @endif name="project_type_fixed" value="1" type="checkbox">
                                <span></span>Fixed</label>

                                        <label class="checkbox">
                                    <input @if($project_filter->project_type->hourly) checked @endif name="project_type_hourly" value="1" type="checkbox">
                                    <span></span>Hourly</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="font-weight-bold">Fixed Price</label>
                                    <div class="ion-range-slider">
                                        <input name="fixed_price" type="hidden" id="kt_fixed_price" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="font-weight-bold">Hourly Price</label>
                                    <div class="ion-range-slider">
                                        <input name="hourly_price" type="hidden" id="kt_hourly_price" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Skills*</label>
                                    <select required style="width: 100%;" class="form-control select2" name="skills[]" multiple="multiple">
                                    @foreach($skills as $skill)
                                        <option @if(in_array($skill->id, $selected_skills)) selected @endif value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Languages*</label>
                                    <select required style="width: 100%;" class="form-control select2 languages" name="languages[]" multiple="multiple">
                                    @foreach($languages as $language)
                                        <option @if(in_array($language->id, $selected_languages)) selected @endif value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Listing Type</label>
                                    <div class="d-flex flex-wrap">
                                        @foreach($project_filter->listing_type as $type => $is_true)
                                            <div class="checkbox-list mr-10 mb-4">
                                                <label class="checkbox">
                                                <input @if($is_true) checked @endif name="listing_type[{{$type}}]" value="1" type="checkbox">
                                                @php if($type == 'assisted'){ $type = 'Recruiter'; }@endphp
                                                <span></span>{{ ucwords($type) }}</label>
                                            </div>
                                        @endforeach
                                    </div>



                                </div>
                            </div>

                        </div>
                    
                </div>
                <div class="card-footer">
                    <div class="col-lg-12 text-right">
                        <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i> Update</button>
                    </div>
                </div>
            
            </div>
        </div>
    </form>
    </div>

</div>
@endsection


@section('page_js')
<script>
    $(document).ready(function() {

        $('.select2').select2({
            placeholder: "Please select skills",
        });

        $('.select2.languages').select2({
            placeholder: "Please select languages",
        });

        $('#kt_fixed_price').ionRangeSlider({
            skin: "round",
            type: "double",
            grid: false,
            min: 1,
            max: 10000,
            from: {{ $project_filter->fixed_price->min }},
            to: {{ $project_filter->fixed_price->max }},
            prefix: "$"
        });

        $('#kt_hourly_price').ionRangeSlider({
            skin: "round",
            type: "double",
            grid: false,
            min: 1,
            max: 120,
            from: {{ $project_filter->hourly_price->min }},
            to: {{ $project_filter->hourly_price->max }},
            prefix: "$"
        });

        // $("#filter_form").on('submit', function(e) {
        //     e.preventDefault();
        //     toastr.success("Filters updated successfully.", "Success");
        // });

    });
</script>
@endsection