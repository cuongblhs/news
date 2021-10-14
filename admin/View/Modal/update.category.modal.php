<div class="modal fade modal-second" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold"  id="exampleModalLabel">Thêm chủ đề mới</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="updateCategoryForm"  method="post" action="?action=update_category">
            <input type="text" class="form-control" hidden="true" autocomplete="off" id="id_update" required name="id_update">
            <div class="form-group">
                <label>Tên chủ đề</label>
                <input type="text" class="form-control"  autocomplete="off" id="name_update" required name="name_update">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
            <button class="btn btn-primary" form="updateCategoryForm">Lưu</button>
        </div>
        </div>
    </div>
</div>