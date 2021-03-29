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
                            <label class="font-weight-bold">Starter:</label>
                            <textarea rows="5" required name="starter" class="form-control" v-model="starter"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">About:</label>
                            <textarea rows="5" required name="about" class="form-control" v-model="about"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tech Star:</label>
                            <textarea rows="5" required name="tech_star" class="form-control" v-model="tech_star"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Portfolio Initiator:</label>
                            <textarea rows="5" required name="portfolio_initiator" class="form-control" v-model="portfolio_initiator"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Portfolio:</label>
                            <textarea rows="5" required name="portfolio" class="form-control" v-model="portfolio"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Ender:</label>
                            <textarea rows="5" required name="ender" class="form-control" v-model="ender"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Days:</label>
                            <input type="number" name="period" min="1" max="800" v-model="days" required placeholder="Enter Days"  class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Budget:</label>

                            <div class="input-group">
                                <input name="amount" type="number" min="1" max="99999999" v-model="budget" required placeholder="Enter Budget" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">{{ $project->currency->code }}</button>
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