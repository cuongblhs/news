<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="infoModalBody">
                <form id="changePasswordForm"  method="post" action="?action=change_password_act" enctype="multipart/form-data">
                <input type="text" class="form-control" hidden="true" autocomplete="off" id="author_id" required name="author_id">
                    <div class="form-group">
                        <label for="machine_name">Tài khoản</label><span class="text-danger"> *</span>
                        <input type="text" disabled class="form-control" id="get_name" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Mật khẩu mới</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="new_password" name="new_password" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Nhập lại mật khẩu</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="re_new_password" name="re_new_password" style="width: 100%;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                <button class="btn btn-primary" form="changePasswordForm">Lưu lại</button>
            </div>
        </div>
    </div>
</div>