<?php if (!defined('__CONTROLLER__')) return; ?>
<?php
getTemplate("header", $viewParams); ?>

    <body>
<div class="container-scroller">
    <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <!-- topbar -->
        <?php getTemplate("topbar", $viewParams); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ">
            <div class="container fade-up  p-5" style="background-color: whitesmoke;">
                <?php
                if ($viewParams['news_detail'] !== 'null') {
                    $item = $viewParams['news_detail'];
                    $cnt = 0;
                    ?>
                    <h2 class="text-uppercase text-weight-bold"><?php echo $item['title']; ?></h2>
                    <div class="row">
                        <div class="ml-3" style="display: inline-block">
                            <p class="fs-15  text-muted mb-0">
                                <span class="mr-2 badge badge-info font-weight-bold"><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?></span>
                            </p>
                        </div>
                        <div style="display: inline-block">
                            <p class="fs-20  text-success mb-0">
                                <span class="mr-2 font-weight-bold"><?php echo $item['display_name']; ?></span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 vertical-align">
                            <img src="./admin/<?php echo $item['banner_image']; ?>"
                                 style="object-fit: cover; text-algin:center; max-width:1500px; height: 500px;" alt="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                        <?php echo $item['content']; ?>
                        </div>
                    </div>
                <?php } else echo "Không có dữ liệu"; ?>
                <hr>
                <?php
                if ($viewParams['news_detail'] !== 'null') { ?>
                <div class="">
                    <div class="card-header">
                        <h4 class="mb-0">
                            Gửi bình luận
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="addCommentForm" method="post" action="?action=add_comment_act"
                              enctype="multipart/form-data">
                            <input type="text" hidden name="news_id" value="<?php echo $_GET['n_id']; ?>">
                            <div class="form-group">
                                <label>Email</label><span class="text-danger"> *</span>
                                <input type="email" placeholder="Nhập email" class="form-control" autocomplete="off"
                                       required name="email">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label><span class="text-danger"> *</span>
                                <textarea type="text" class="form-control" placeholder="Hãy để lại bình luận ở đây"
                                          autocomplete="off" required name="content">
                                </textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Hủy bỏ</button>
                        <button class="btn btn-primary" form="addCommentForm">Lưu</button>
                    </div>
                </div>

                <?php
                if (count($viewParams['comments']) > 0) {
                    $cnt = 0;
                    foreach ($viewParams['comments'] as $item) { ?>
                        <div class="media border p-2 m-2">
                            <img src="./admin/dist/img/avatar.png" alt="avatar" class="mr-3 mt-3 rounded-circle"
                                 style="width:60px;">
                            <div class="media-body">
                                <h4><?php echo $item['email']; ?></h4>
                                <small><i><?php echo date('d/m/Y H:i:s', strtotime($item['create_at'])); ?></small>
                                <p><?php echo $item['content']; ?></p>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- topbar -->
<?php getTemplate("footer", $viewParams); ?>
