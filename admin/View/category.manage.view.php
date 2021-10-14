<?php if(!defined('__CONTROLLER__')) return; ?>
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
                        <h1>Chủ đề</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a title="Click để thêm mới" data-toggle="modal" data-target="#addCategoryModal" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus-square"></i> Thêm mới
                                </a>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content p-2">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách chủ đề</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên chủ đề</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa đổi</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if (count($viewParams['categories']) > 0){
                            $cnt = 0;
                            foreach ($viewParams['categories'] as $item) {?>
                                <tr>
                                    <td><?php echo ++$cnt;?></td>
                                    <td><?php echo $item['name'];?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($item['create_at']));?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($item['update_at']));?></td>
                                    <td>
                                        <a title="Click để sửa" data-toggle="modal" data-target="#updateCategoryModal" onclick="getCategoryDetail('<?php echo $item['id']; ?>')" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Sửa
                                        </a>
                                        <a title="Click để xóa" data-toggle="modal" data-target="#deleteCategoryModal" onclick="setDeleteCategoryId('<?php echo $item['id']; ?>')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php }}?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên chủ đề</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa đổi</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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