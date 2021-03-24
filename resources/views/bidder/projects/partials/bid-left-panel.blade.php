    <!-- Bid left Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-left p-10">

        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <!-- <h3 class="font-weight-bold m-0">User Profile
                <small class="text-muted font-size-sm ml-2">12 messages</small></h3> -->
            <span></span>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>

        <div class="offcanvas-content pr-5 mr-n5">
            <form id="bid_now_form" method="post" action="{{ route('bidder.projects.bid_now') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $project->id }}">
                <input type="hidden" name="project_id" value="{{ $project->project_id }}">
                <input type="hidden" name="milestone_percentage" value="100">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Details:</label>
                            <textarea rows="7" required name="description" class="form-control" placeholder="Enter Details"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Days:</label>
                            <input type="number" name="period" min="1" max="800" required placeholder="Enter Days" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Budget:</label>

                            <div class="input-group">
                                <input name="amount" type="number" min="1" max="99999999" required placeholder="Enter Budget" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">USD</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button id="kt_quick_user_toggle" class="btn btn-primary"><i class="flaticon-price-tag"></i>Bid Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Bid left Panel Ends-->