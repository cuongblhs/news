<?php if (!defined('__CONTROLLER__')) return; ?>
<?php
getTemplate("header", $viewParams); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- topbar -->
        <?php getTemplate("topbar", $viewParams); ?>
        <!-- sidebar -->
        <?php getTemplate("sidebar", $viewParams); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tin tức</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Sửa thông tin</h3>
                                </div>
                                <!-- /.card-header -->
                                <form id="updateNewsForm" method="post" action="?action=update_news_act" enctype="multipart/form-data">
                                    <?php
                                    $news_detail = $viewParams['news_detail'];
                                    $news_id = $_GET['news_id'];
                                    if ($news_detail !== 'null') {
                                    ?>
                                        <div class="card-body">
                                            <input class="form-control" id="id_update" value="<?php echo $news_id; ?>" name="id_update" hidden>
                                            <div class="form-group">
                                                <label>Tiêu đề: </label><span class="text-danger"> *</span>
                                                <input class="form-control" required id="title_update" name="title_update" value="<?php echo $news_detail['title']; ?>" placeholder="Tiêu đề bài viết">
                                            </div>
                                            <div class="form-group">
                                                <label>Chủ đề: </label><span class="text-danger"> *</span>
                                                <select class="form-control" id="id_category_update" name="id_category_update" required>
                                                    <?php
                                                    if (count($viewParams['categories']) > 0) {
                                                        $cnt = 0;
                                                        foreach ($viewParams['categories'] as $item_category) {
                                                            if ($item_category['name'] == $news_detail['name']) { ?>
                                                                <option class="form-control" selected value="<?php echo $item_category['id']; ?>"><?php echo $item_category['name']; ?></option>
                                                            <?php } else { ?>
                                                                <option class="form-control" value="<?php echo $item_category['id']; ?>"><?php echo $item_category['name']; ?></option>
                                                        <?php }
                                                        }
                                                    } else { ?>
                                                        <option class="form-control" value="None">-----Chưa có thể loại-----</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Ảnh bìa: </label><span class="text-danger"> *</span>
                                                <input type="file" id="readUrl" value="<?php echo $news_detail['banner_image']; ?>" name="readUrl" class="form-control" placeholder="Upload ảnh bìa">
                                            <img id="banner_image" name = "banner_image" src="<?php echo $news_detail['banner_image'];?>" alt="Uploaded Image" accept="image/png, image/jpeg, image/jpg, image/gif" style="height: 60%; max-height: 300px; min-width:60%; max-width: 80%;   ">
                                            </div>

                                            <div class="form-group">
                                                <textarea id="summernote" name="content" class="form-control" style="height: 300px">
                                                <?php echo $news_detail['content']; ?>
                                            </textarea>
                                            </div>
                                        </div>
                                    <?php } else echo '<h2>Không tồn tại</h2>'; ?>
                                    <!-- /.card-body -->
                                </form>
                                <div class="card-footer">
                                    <?php
                                    if ($news_detail !== 'null') {
                                    ?>
                                        <div class="float-right">
                                            <button type="submit" id="updateNewsBtn" name="updateNewsBtn" class="btn btn-primary" form="updateNewsForm"><i class="far fa-envelope"></i> Lưu lại</button>
                                        </div>
                                    <?php } ?>
                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Hủy bỏ</button>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- topbar -->
        <?php getTemplate("footer", $viewParams); ?>