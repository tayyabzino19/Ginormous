@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_exclude_nav', 'menu-item-active')

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
                    Exclude
                </li>
            </ul>
        </div>
    </div>


    <div class="row">
                            
        <div class="col-lg-12">
            <form id="exclude_form" method="post" action="{{ route('admin.projects.exclude.update') }}">
            @csrf

            <div class="card card-custom">
               
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Exclude</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.projects.exclude.sync') }}" data-toggle="tooltip" title="Sync Contries & Currencies" style="height: 32px; width: 32px;" class="btn btn-icon btn-warning btn-sm btn-circle btn-dropdown btn-lg mr-1 pulse pulse-light">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <i class="ki ki-reload" style="font-size: 14px;"></i>
                            </span>
                            <span class="pulse-ring"></span>
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Countries</label>
                                <select style="width: 100%;" class="form-control select2 countries" name="countries[]" multiple="multiple">
                                    @foreach($countries as $country)
                                        <option @if($exclude && in_array($country->code, $exclude->countries)) selected @endif  value="{{ $country->code }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Currencies</label>
                                <select style="width: 100%;" class="form-control select2 currencies" name="currencies[]" multiple="multiple">
                                    @foreach($currencies as $currency)
                                        <option @if($exclude && in_array($currency->code, $exclude->currencies)) selected @endif value="{{ $currency->code }}">{{ $currency->name }}</option>
                                    @endforeach
                                </select>
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
        
        $('.select2.countries').select2({
            placeholder: "Select Countries",
        });

        $('.select2.currencies').select2({
            placeholder: "Select Currencies",
        });

        $('#exclude_form').on('submit', function(e){
            let countries = $('.countries').val();
            let currencies = $('.currencies').val();
            if(countries == '' && currencies == ''){
                e.preventDefault();
            }
        });



    });
</script>
@endsection