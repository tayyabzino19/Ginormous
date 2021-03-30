@extends('admin.layouts.master')

@section('settings_nav', 'menu-item-open')
@section('settings_api_keys_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="row mb-6">
                <div class="col-lg-12">
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Settings
                        </li>
                        <li class="breadcrumb-item">
                            API Keys
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">API Keys</h3>
                            </div>
                            <div class="card-toolbar">
                                <i class="flaticon-settings"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method='post' action="{{ route('admin.settings.freelancer_api_client.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $client->id }}">
                                <div class="row">
                                    <div class="col-lg-6 mb-5">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> Client ID* </label>
                                            <input type="text" value="{{ $client->client_id }}" name="client_id" placeholder="Please Enter Client ID" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-5">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> Auth Key* </label>
                                            <input type="text" value="{{ $client->auth_key }}" name="auth_key" placeholder="Please Enter Auth Key" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-5 font-weight-bold">
                                        @if($client->status == 'connected')
                                        <i class="far fa-check-circle mt-1 d-inline-block text-success"></i> <span class="text-success">Connected</span>
                                        @else
                                        <i class="far fa-times-circle mt-1 d-inline-block text-danger"></i> <span class="text-danger">Invalid</span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 text-right">
                                        <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection