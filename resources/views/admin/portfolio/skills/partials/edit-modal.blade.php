 <!--begin::Modal-->
 <div class="modal fade" id="edit_skill_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form id="edit_skill_form" method="post" action="{{ route('admin.portfolio.skills.update') }}">
                @csrf
                <input type="hidden" name="id">
                <input type="hidden" name="status" value="inactive">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="float-right">
                                <span class="switch switch-icon">
                                    <span class="font-weight-bold">Status</span> <label class="ml-2">
                                <input type="checkbox" value="active" checked="checked" name="status" />
                                <span></span>
                                </label>
                                </span>
                            </div>

                            <div class="form-group float-left w-100">
                                <label class="font-weight-bold">Name*</label>
                                <input type="text" required name="name" class="form-control" value="HTML" placeholder="Enter skill here">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->