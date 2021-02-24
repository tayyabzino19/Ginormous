@extends('bidder.layouts.master')

@section('leaves_nav', 'menu-item-open')
@section('leaves_all_leaves_nav', 'menu-item-active')

@section('main')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <form id="leave_request_form" method="post" action="{{ route('bidder.leaves.save') }}">
            @csrf
        <div class="row mb-6">
            <div class="col-lg-12">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">

                    <li class="breadcrumb-item">
                        <a href="{{ route('bidder.index') }}"><i class="fa fa-home"></i></a>
                    </li>
                    
                    <li class="breadcrumb-item">
                        <a href="{{ route('bidder.leaves.index') }}">Leaves</a>
                    </li>

                    <li class="breadcrumb-item">
                       Leave Request
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Leave Request</h3>
                        </div>
                        <div class="card-toolbar">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div id="hours_show"></div>
                            <div class="col-lg-12 leave_type">
                                <div class="form-group">
                                    <label class="font-weight-bold">Type*</label>
                                    <select style="width: 100%;" class="form-control select2 type" name="type" required>
                                        <option value=""></option>
                                        <option value="short_leave">Short Leave</option>
                                        <option value="half_day">Half Day</option>
                                        <option value="full_day">Full Day</option>
                                        <option value="multiple_days">Multiple Days</option>
                                    </select>
                                </div>
                                
                            </div>

                            {{-- <div class="col-lg-12 fullday_radio d-none">
                                <div class="form-group">
                                    <div class="radio-inline">
                                        <label class="radio">
                                        <input type="radio" name="full_day_type" class="single_day" />
                                        <span></span>Single Day</label>
                                        <label class="radio">
                                        <input type="radio" class="full_day" name="full_day_type" />
                                        <span></span>Multiple Days</label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-lg-12 col-md-12 col-sm-12 date_only d-none">
                                <div class="form-group">
                                    <label class="font-weight-bold">Date*</label>
                                    <input name="leave_date" type="text" class="form-control datepicker w-100" placeholder="Select date" />
                                </div>
                            </div>

                            <div class="col-lg-6 from_to_time d-none">
                                <div class="form-group">
                                    <label class="font-weight-bold">From*</label>
                                    <input name="leave_time_from" class="form-control from timepicker" id="from_time" placeholder="Select from time" type="text" />
                                </div>
                            </div>

                            <div class="col-lg-6 from_to_time d-none">
                                <div class="form-group">
                                    <label class="font-weight-bold">To*</label>
                                    <input name="leave_time_to" class="form-control to timepicker" id="to_time" placeholder="Select to time" type="text" />
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 date_range d-none">
                                <div class='form-group'>
                                    <label class="font-weight-bold">Date Range*</label>
                                    <div id='kt_daterangepicker_2'>
                                        <input name="leave_date_range" type='text' class="form-control" placeholder="Select date range" />
                                    </div>
                                    <span class="float-right text-danger font-size-xs pr-1" id="days_calculated"></span>
                                </div>
                            </div>

                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Reason*</label>
                                    <textarea name="reason" class="form-control" required placeholder="Please Enter reason here" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 text-right">
                                <button class="btn btn-primary"><i class="flaticon2-check-mark" style="font-size: 12px;"></i>Send Leave Request</button>
                            </div>

                        </div>
        
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </form>
    </div>
</div>
@endsection



@section('page_js')
<script>
    $(document).ready(function(){
        $(".select2.type").select2({
            placeholder: "Please select a type"
        });
  
        //leave_type
        $(".type").on("change", function(){

           if($(this).val() == "short_leave"){
                $(".date_only").removeClass("d-none");
                $(".date_only").addClass("d-block");
                $(".date_only input").prop("required", true);

                $(".from_to_time").removeClass("d-none");
                $(".from_to_time").addClass("d-block");
                $(".from_to_time input").prop("required", true);


                $(".date_range").removeClass("d-block");
                $(".date_range").addClass("d-none");
                $(".date_range input").prop("required", false);

                // $(".fullday_radio").removeClass("d-block");
                // $(".fullday_radio").addClass("d-none");
                // $(".fullday_radio input").prop("required", false);


           }else if($(this).val() == "half_day"){

                $(".date_only").removeClass("d-none");
                $(".date_only").addClass("d-block");
                $(".date_only input").prop("required", true);

                $(".from_to_time").removeClass("d-none");
                $(".from_to_time").addClass("d-block");
                $(".from_to_time input").prop("required", true);


                $(".date_range").removeClass("d-block");
                $(".date_range").addClass("d-none");
                $(".date_range input").prop("required", false);

                // $(".fullday_radio").removeClass("d-block");
                // $(".fullday_radio").addClass("d-none");
                // $(".fullday_radio input").prop("required", false);

           }else if($(this).val() == "full_day"){

                // $("input[name='full_day_type']").prop("checked", false);

                // $(".fullday_radio").removeClass("d-none");
                // $(".fullday_radio").addClass("d-block");
                // $(".fullday_radio input").prop("required", true);

                $(".date_only").removeClass("d-none");
                $(".date_only").addClass("d-block");
                $(".date_only input").prop("required", true);

                $(".from_to_time").removeClass("d-block");
                $(".from_to_time").addClass("d-none");
                $(".from_to_time input").prop("required", false);

                $(".date_range").removeClass("d-block");
                $(".date_range").addClass("d-none");
                $(".date_range input").prop("required", false);

            }else{
                // $(".fullday_radio").removeClass("d-block");
                // $(".fullday_radio").addClass("d-none");
                // $(".fullday_radio input").prop("required", true);

                $(".date_range").removeClass("d-none");
                $(".date_range").addClass("d-block");
                $(".date_range input").prop("required", true);

                $(".date_only").removeClass("d-block");
                $(".date_only").addClass("d-none");
                $(".date_only input").prop("required", false);

                $(".from_to_time").removeClass("d-block");
                $(".from_to_time").addClass("d-none");
                $(".from_to_time input").prop("required", false);

            }

            // if($(".single_day").on('click', function(){
            //     $(".date_only").removeClass("d-none");
            //     $(".date_only").addClass("d-block");
            //     $(".date_only input").prop("required", true);

            //     $(".date_range").removeClass("d-block");
            //     $(".date_range").addClass("d-none");
            //     $(".date_range input").prop("required", false);

            // }));

            // if($(".full_day").on('click', function(){
                
            //     $(".date_range").removeClass("d-none");
            //     $(".date_range").addClass("d-block");
            //     $(".date_range input").prop("required", true);

            //     $(".date_only").removeClass("d-block");
            //     $(".date_only").addClass("d-none");
            //     $(".date_only input").prop("required", false);
                
            // }));

        });

        $("#leave_request_form").on("submit", function(e){
            
            e.preventDefault();

            // Hours and mins check
            let valuestart = $("#from_time").val();
            let valuestop = $("#to_time").val();

            //create date format          
            let fromTime = new Date("01/01/2007 " + valuestart).getHours();
            let toTime = new Date("01/01/2007 " + valuestop).getHours();


            let fromTimeMin = new Date("01/01/2007 " + valuestart).getMinutes();
            let toTimeMin = new Date("01/01/2007 " + valuestop).getMinutes();


            let hourDiff = toTime - fromTime;
            let minDiff = toTimeMin - fromTimeMin;

            let type = $(".type").val();

            if(type == 'short_leave' || type == "half_day"){
                if(hourDiff < 0){
                    toastr.error("Please correct From and To values.", "Error");
                    return false;
                }
            }

            if(type == 'short_leave'){
                if(hourDiff > 3){
                    toastr.error("You can only request shortleave for 3 hours.", "Error");
                    return false;
                }

                if(hourDiff == 3 && minDiff > 0){
                    toastr.error("You can only request shortleave for 3 hours.", "Error");
                    return false;
                }
            }

            if(type == 'half_day'){
                if(hourDiff > 5){
                    toastr.error("You can only request halfday for 5 hours.", "Error");
                    return false;
                }

                if(hourDiff == 5 && minDiff > 0){
                    toastr.error("You can only request halfday for 5 hours.", "Error");
                    return false;
                }
            }

            //toastr.success("Leave requested successfully.", "Success");
            e.currentTarget.submit();

        });

    });

   
</script>


<script>
var KTBootstrapDatepicker = function () {
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    // Private functions
    var demos = function () {
        // minimum setup
        $('.datepicker').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            startDate: new Date(),
            format: 'dd-M-yyyy'
            // todayBtn: "linked",
            // clearBtn: true,
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
    }();

    jQuery(document).ready(function() {    
    KTBootstrapDatepicker.init();
    });        
</script>

<script>
var KTBootstrapDaterangepicker = function () {

// Private functions
var demos = function () {

// predefined ranges
var start = moment().subtract(29, 'days');
var end = moment();

// input group and left alignment setup
$('#kt_daterangepicker_2').daterangepicker({
    buttonClasses: ' btn',
    applyClass: 'btn-primary',
    cancelClass: 'btn-secondary',
    minDate: moment(), // Current day
    maxDate: moment().add(90, 'days'), // 30 days from the current day
}, function(start, end, label) {
    $('#kt_daterangepicker_2 .form-control').val( start.format('DD-MMM-YYYY') + ' to ' + end.format('DD-MMM-YYYY'));
    $("#days_calculated").text((end.diff(start, "days")+1) + " Days");
});
}


return {
// public functions
init: function() {
    demos();
}
};
}();

jQuery(document).ready(function() {
KTBootstrapDaterangepicker.init();
});
</script>

<script>
// minimum setup
$('.timepicker').timepicker({
    minuteStep: 1,
    defaultTime: '',
    showSeconds: false,
    showMeridian: true,
    snapToStep: true
});
</script>

@endsection