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
                                <h3 class="card-title">Thêm tin tức mới</h3>
                            </div>
                            <!-- /.card-header -->
                            <form id="addNewsForm" method="post" action="?action=add_news_act"
                                  enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề: </label><span class="text-danger"> *</span>
                                        <input class="form-control" required name="title"
                                               placeholder="Tiêu đề bài viết">
                                    </div>
                                    <div class="form-group">
                                        <label>Chủ đề: </label><span class="text-danger"> *</span>
                                        <select class="form-control" name="id_category" required>
                                            <?php
                                            if (count($viewParams['categories']) > 0) {
                                                $cnt = 0;
                                                foreach ($viewParams['categories'] as $item) { ?>
                                                    <option class="form-control"
                                                            value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                                <?php }
                                            } else { ?>
                                                <option class="form-control" value="None">-----Chưa có thể loại-----
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh bìa: </label><span class="text-danger"> *</span>
                                        <input required type="file" id="readUrl" name="readUrl" class="form-control"
                                               placeholder="Upload ảnh bìa">
                                        <img id="banner_image" name="banner_image" src="#" alt="Uploaded Image"
                                             accept="image/png, image/jpeg, image/jpg, image/gif"
                                             style="display:none; width: 200px; padding: 15px 0   ">
                                    </div>

                                    <div class="form-group">
                                            <textarea id="summernote" name="content" class="form-control"
                                                      style="height: 300px">
                                                <p>Viết nội dung tin tức ở đây.....</p>
                                            </textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" id="addNewsBtn" name="addNewsBtn" class="btn btn-primary"
                                            form="addNewsForm"><i class="far fa-envelope"></i> Lưu lại
                                    </button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Hủy bỏ
                                </button>
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