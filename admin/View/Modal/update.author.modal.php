<div class="modal fade" id="updateAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin <span id="username_update" class="text-info"> </span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="infoModalBody">
                <form id="updateCommentForm"  method="post" action="?action=update_author" enctype="multipart/form-data">
                <input type="text" class="form-control" hidden="true" autocomplete="off" id="update_id" required name="update_id">
                    <div class="form-group">
                        <label for="machine_name">Tên hiển thị</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="update_display_name" name="update_display_name" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Số điện thoại</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="update_phone" name="update_phone" style="width: 100%;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                <button class="btn btn-primary" form="updateCommentForm">Lưu lại</button>
            </div>
        </div>
    </div>
</div>