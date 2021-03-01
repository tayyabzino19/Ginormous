@extends('admin.layouts.master')

@section('projects_nav', 'menu-item-open')
@section('projects_missed_nav', 'menu-item-active')

@section("main")
<div class="container">
    <div class="row mb-6">
        <div class="col-lg-12">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                <li class="breadcrumb-item">
                    <a href="https://zino.brhythym.com/admin"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    Projects
                </li>
                <li class="breadcrumb-item">
                    Missed
                </li>
            </ul>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="{{ route('admin.projects.details') }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <span title="Hourly" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-success font-weight-bolder">H</span>

                            </div>
                        </div>
                        <div class="col-lg-10">
                            <p class="font-weight-bolder mb-2">
                                <div class="float-left font-weight-bolder">
                                    The standard Lorem Ipsum passage, used since the 1500s
                                    <br />
                                    <small class="text-muted font-weight-lighter">2min ago</small>
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bolder">$100 - $200 (USD)</span>
                                </div>
                                <div class="clearfix"></div>
                            </p>
                            <p class="text-dark-65">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod ..
                            </p>
                            <hr />
                            <div class="row">
                                <div class="col-lg-5">
                                    20 <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">4.0</span> &nbsp;|&nbsp; 20 <strong class="text-warning">Reviews</strong>
                                </div>
                                <div class="col-lg-7">
                                    <span class="label label-inline label-dark mb-1">Recruiter</span>
                                    <span class="label label-inline label-warning mb-1">Featured</span>
                                    <span class="label label-inline label-primary mb-1">Sealed</span>
                                    <span class="label label-inline label-info mb-1">NDA</span>
                                    <span class="label label-inline label-danger mb-1">Urgent</span>
                                    <span class="label label-inline label-success mb-1">Fulltime</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <button title="" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-primary action_btn" data-original-title="Bid Later"><i class="far fa-clock"></i></button>
                            </div>
                        </div>
                        
                        

                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b feed_card" data-link="{{ route('admin.projects.details') }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <span title="Fixed" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-primary font-weight-bolder">F</span>

                            </div>
                        </div>
                        <div class="col-lg-10">

                            <p class="font-weight-bolder mb-2">
                                <div class="float-left font-weight-bolder">
                                    Where does it come from
                                    <br />
                                    <small class="text-muted font-weight-lighter">2hrs ago</small>
                                </div>
                                <div class="float-right">
                                    <span class="font-weight-bolder">$100 - $200 (USD)</span>
                                </div>
                                <div class="clearfix"></div>
                            </p>

                            <p class="text-dark-65">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type ..
                            </p>
                            <hr />
                            <div class="row">
                                <div class="col-lg-5">
                                    10 <strong>Bids</strong> &nbsp;|&nbsp; <span title="Ratings" data-toggle="tooltip" class="label label-inline">4.3</span> &nbsp;|&nbsp; 10 <strong class="text-warning">Reviews</strong>
                                </div>
                                <div class="col-lg-7">
                                    <span class="label label-inline label-dark mb-1">Recruiter</span>
                                    <span class="label label-inline label-warning mb-1">Featured</span>
                                    <span class="label label-inline label-primary mb-1">Sealed</span>
                                    <span class="label label-inline label-info mb-1">NDA</span>
                                    <span class="label label-inline label-danger mb-1">Urgent</span>
                                    <span class="label label-inline label-success mb-1">Fulltime</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                            <div>
                                <button title="Bid Later" data-toggle="tooltip" class="btn btn-sm btn-circle btn-icon btn-light-primary action_btn"><i class="far fa-clock"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection

@section('page_js')

@section('page_css')
<style>
    .feed_card{
        cursor: pointer;
    }
</style>
@endsection

<script>
    $(document).ready(function(){

        $(".feed_card").click(function(e){
            if( $(e.target).closest(".action_btn").length < 1 ) {
                window.location = $(this).attr('data-link');   
            }
        });
    })
</script>
@endsection