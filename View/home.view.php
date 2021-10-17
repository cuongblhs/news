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
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                    <div class="col-xl-12 stretch-card grid-margin">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <h1>CICD done</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 stretch-card grid-margin">
                            <div class="position-relative w-100 h-100">
                                <?php
                                if ($viewParams['total_news'] > 0) {
                                    $item = $viewParams['news'][0]; ?>
                                    <a href="?link=news_detail&n_id=<?php echo $item['id']; ?>">
                                        <img src="admin/<?php echo $item['banner_image']; ?>" alt="banner" class="img-fluid" />
                                    </a>
                                    <div class="banner-content w-100" style="opacity: 0.7; background-color: black;">

                                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                            <?php echo $item['display_name']; ?>
                                        </div>
                                        <h1 class="mb-2"><?php echo $item['title']; ?></h1>
                                        <div class="fs-12">
                                            <span class="mr-2"></span><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-4 stretch-card grid-margin">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <h2>Tin tức mới nhất</h2>
                                    <?php
                                    if (count($viewParams['news']) > 0) {
                                        $cnt = 0;
                                        foreach ($viewParams['news'] as $item) {
                                            if ($cnt > 2) break;
                                            $cnt++; ?>
                                            <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                                <div class="pr-3">
                                                    <a href="?link=news_detail&n_id=<?php echo $item['id']; ?>" class="text-white">
                                                        <h5><?php echo $item['title']; ?></h5>
                                                    </a>
                                                    <div class="fs-12">
                                                        <span class="mr-2"></span><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?>
                                                    </div>
                                                </div>
                                                <div class="rotate-img">
                                                    <img src="admin/<?php echo $item['banner_image']; ?>" alt="thumb" class="img-fluid img-lg" />
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-uppercase">Chủ đề</h2>
                                    <ul class="vertical-menu">
                                        <?php
                                        if (count($viewParams['categories']) > 0) {
                                            $cnt = 0;
                                            foreach ($viewParams['categories'] as $item) { ?>
                                                <li>
                                                    <a href="?link=news_list&cate_id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                                                </li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (count($viewParams['news']) > 0) {
                                        $cnt = 0;
                                        foreach ($viewParams['news'] as $item) {
                                            if ($cnt > 4) break;
                                            $cnt++; ?>
                                            <div class="row">
                                                <div class="col-sm-4 grid-margin">
                                                    <div class="position-relative">
                                                        <div class="rotate-img">
                                                            <img src="admin/<?php echo $item['banner_image']; ?>" alt="thumb" class="img-fluid" />
                                                        </div>
                                                        <div class="badge-positioned">
                                                            <span class="badge badge-danger font-weight-bold">News</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8  grid-margin" style="border-bottom: black; max-height: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                    <a href="?link=news_detail&n_id=<?php echo $item['id']; ?>" class="text-dark">
                                                        <h2 class="mb-2 font-weight-600">
                                                            <?php echo $item['title']; ?>
                                                        </h2>
                                                    </a>
                                                    <div class="fs-14 mb-2">
                                                        <span class="mr-2 badge badge-info font-weight-bold"><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?></span>
                                                    </div>
                                                    <p class="mb-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        <?php echo $item['content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
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