@extends('bidder.layouts.master')
@section('dashboard_nav', 'menu-item-active')

@section('main')
<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-primary"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Bidded</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">20</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-success"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Accepted</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">1</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-danger"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Missed</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">5</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-list text-warning"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-warning font-weight-bold font-size-h6 mb-3">Projects</a>
                            <div class="text-dark-75">Replied</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">3</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        
    </div>

    <div class="row mt-md-6">
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-primary"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Total</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">20</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-success"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Accepted</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">1</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-danger"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Rejected</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">5</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
    
        <div class="col-lg-3">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center p-1">
                        <!--begin::Icon-->
                        <div class="mr-6">
                            <span class="notification_card_icon flaticon-calendar-3 text-warning"></span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="text-warning font-weight-bold font-size-h6 mb-3">Leaves</a>
                            <div class="text-dark-75">Pending</div>
                        </div>
                        <div class="flex-grow-1 text-right">
                            <h1 class="font-size-h4">3</h1>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        
    </div>


</div>
@endsection