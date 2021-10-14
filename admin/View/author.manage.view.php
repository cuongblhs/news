<?php if (!defined('__CONTROLLER__')) return; ?>
<?php
getTemplate("header", $viewParams); ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="././dist/img/news_logo.png" alt="AdminLogo" height="60" width="60">
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
                            <h1>Tác giả</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a title="Click để thêm mới" data-toggle="modal" data-target="#addAuthorModal" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus-square"></i> Thêm mới
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content p-2">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <?php
                            if (count($viewParams['list_author']) > 0) {
                                $sum = count($viewParams['list_author']);
                                $limit = 6;
                                $tmp = $sum / $limit;
                                $total_page = ceil($tmp);

                                if (isset($_GET['page'])) $current_page = $_GET['page'];
                                else $current_page = 1;
                                $cnt = 0;
                                foreach ($viewParams['authors'] as $item) { ?>
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                                STT - <?php echo ++$cnt; ?>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b><?php echo $item['username']; ?></b></h2>
                                                        <p class="text-muted text-sm"><b>Tên hiển thị: </b> <?php echo $item['display_name']; ?> </p>
                                                        <p class="text-muted text-sm"><b>Ngày tạo: </b> <?php echo date('d/m/Y', strtotime($item['create_at'])); ?> </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <!-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Số bài đăng: <?php echo $item['cnt']; ?></li> -->
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <?php echo $item['phone']; ?></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img src="<?php echo $item['avatar']; ?>" alt="user-avatar" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6 text-left">
                                                        <a title="Đổi mật khẩu" href="#" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#changePasswordModal" onclick="setItemId(<?php echo $item['id']; ?>, '<?php echo $item['username']; ?>');">
                                                            <i class="fa fa-key"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6 text-right">
                                                        <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#deleteAuthorModal" onclick="setDeleteItemId(<?php echo $item['id']; ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a title="Click để sửa" data-toggle="modal" data-target="#updateAuthorModal" onclick="getAuthorDetail('<?php echo $item['id']; ?>')" class="btn btn-info btn-sm">
                                                            <i class="fas fa-user"></i>Sửa
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <ul class="pagination" style="padding-top:0px !important;">
                                    <?php
                                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                    if ($current_page > 1 && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?link=authors&page=' . ($current_page - 1) . '">Trước</a></li> ';
                                    }

                                    // Lặp khoảng giữa
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        // Nếu là trang hiện tại thì hiển thị thẻ span
                                        // ngược lại hiển thị thẻ a
                                        if ($i == $current_page) {
                                            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="?link=authors&page=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }

                                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                    if ($current_page < $total_page && $total_page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?link=authors&page=' . ($current_page + 1) . '">Tiếp</a></li> ';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                                echo '<div class="col-6"><p class = "float-right text-info">Trang ' . ($current_page + 1) . '/' . $total_page . '</p></div>';
                            ?>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- topbar -->
        <?php getTemplate("footer", $viewParams); ?>