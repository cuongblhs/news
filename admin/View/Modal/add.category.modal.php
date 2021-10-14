<div class="modal fade modal-second" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase font-weight-bold"  id="exampleModalLabel">Tạo đợt thi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm"  method="post" action="?action=add_category" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên chủ đề</label><span text-danger> *</span>
                    <input type="text" class="form-control" autocomplete="off" required name="name">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                <button class="btn btn-primary" form="addCategoryForm">Lưu</button>
            </div>
        </div>
    </div>
    </div>
    <!-- onclick="creatExam(this)" -->