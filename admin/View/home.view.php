<?php if(!defined('__CONTROLLER__')) return; ?>
<?php 
getTemplate("header", $viewParams); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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
                            <h1>Trang chủ</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content p-2">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Tài khoản</span>
                                    <span class="info-box-number"><?php echo $viewParams['total_author'];?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Bài đăng</span>
                                    <span class="info-box-number"><?php echo $viewParams['total_news'];?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clone"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Chủ đề</span>
                                    <span class="info-box-number"><?php echo $viewParams['total_category'];?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Bình luận</span>
                                    <span class="info-box-number">---</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
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
