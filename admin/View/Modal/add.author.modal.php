<div class="modal fade" id="addAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="infoModalBody">
                <form id="addAuthorForm"  method="post" action="?action=add_author" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="machine_name">Email</label><span class="text-danger"> *</span>
                        <input type="email" require autocomplete="off" class="form-control" id="username" name="username" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Mật khẩu</label><span class="text-danger"> *</span>
                        <input type="password" autocomplete="off" require class="form-control" id="password" name="password" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Nhập lại mật khẩu</label><span class="text-danger"> *</span>
                        <input type="password" autocomplete="off" require class="form-control" id="repassword" name="repassword" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Tên hiển thị</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="display_name" name="display_name" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <label for="machine_name">Số điện thoại</label><span class="text-danger"> *</span>
                        <input type="text" require class="form-control" id="phone" name="phone" style="width: 100%;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                <button class="btn btn-primary" form="addAuthorForm">Lưu lại</button>
            </div>
        </div>
    </div>
</div>