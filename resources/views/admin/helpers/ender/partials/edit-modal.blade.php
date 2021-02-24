 <!--begin::Modal-->
 <div class="modal fade" id="edit_ender_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form id="edit_ender_form" method="post" action="{{ route('admin.helpers.ender.update') }}">
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="status" value="inactive">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ender</h5>
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
                                <label class="font-weight-bold">Description*</label>
                                <textarea name="description" required class="form-control" rows="7" placeholder="Enter description here"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-danger btn-sm btn_delete_ender"><i class="icon-xl la la-trash"></i>Delete</button>
                        <button type="submit" class="btn btn-primary font-weight-bold"><i style="font-size: 12px" class="flaticon2-check-mark"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->