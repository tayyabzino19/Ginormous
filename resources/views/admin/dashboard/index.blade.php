@extends('admin.layouts.master')

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

<div class="row mt-md-6">
    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-primary mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-primary"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-primary font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Total</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">340</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>

    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-success mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-success"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-success font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Active</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">320</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>

    <div class="col-lg-4">
        <!--begin::Callout-->
        <div class="card card-custom wave wave-danger mb-8 mb-lg-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center p-1">
                    <!--begin::Icon-->
                    <div class="mr-6">
                        <span class="notification_card_icon flaticon-users text-danger"></span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="text-danger font-weight-bold font-size-h6 mb-3">Users</a>
                        <div class="text-dark-75">Inactive</div>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <h1 class="font-size-h4">10</h1>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>
</div>





<div class="row mt-md-6">

<div class="col-lg-4">
    <!--begin::List Widget 3-->
    <div class="card card-custom wave wave-primary card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title text-primary font-weight-bolder">Latest 5 Users</h3>
            <div class="card-toolbar">
                <i class="flaticon-users text-primary font-size-h3"></i>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
            <div class="d-flex align-items-center mb-10">
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <a href="#" class="text-dark-50 mb-1 font-size-lg">Ahsan Zahid</a>
                    <span class="text-muted">ahsanzahid@gmail.com</span>
                </div>
                <a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 3-->
</div>


<div class="col-lg-8">
    <!--begin::List Widget 3-->
    <div class="card card-custom wave wave-warning card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title text-warning font-weight-bolder">Latest 5 Pending Leaves</h3>
            <div class="card-toolbar">
                <i class="flaticon-calendar-3 text-warning font-size-h3"></i>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            
            <table class="table borderless">
                <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>Leave Type</th>
                        <th>
                            View
                        </th>
                    </tr>

                </thead>
                <tbody>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                <tr>
                    <td>
                        Sohail Ahmad
                        <br />
                        <span class="text-muted">sohailahmd@gmail.com</span>
                    </td>
                    <td>Short Leave</td>
                    <td><a href="javascript:;" ><i class="far fa-eye text-dark-50"></i></a></td>
                </tr>
                                                
                </tbody>
            </table>

        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 3-->
</div>

</div>
<!--end::Row-->









</div>

@endsection


