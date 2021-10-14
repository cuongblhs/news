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
        <div class="container fade-up">
          <div class="col-sm-12">
            <div class="card" data-aos="fade-up">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 mb-2">
                    <h3 class="font-weight-600 text-uppercase d-inline">
                      <?php echo $viewParams['label']; ?> :  
                    </h3>
                    <h3 class="fs-25 font-weight-200 d-inline"> <?php echo $viewParams['category_name']['name'];?></h3>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-8">
                    <?php if (count($viewParams['news_detail']) > 0) {
                      $sum = count($viewParams['news']);
                      $limit = 6;
                      $tmp = $sum / $limit;
                      $total_page = ceil($tmp);
                      if (isset($_GET['page'])) $current_page = $_GET['page'];
                      else $current_page = 0;
                      $cnt = 0;
                      foreach ($viewParams['news_detail'] as $item) { ?>
                        <div class="row mb-2" style="max-height:150px; overflow: hidden; text-overflow: ellipsis;">
                          <div class="col-sm-4 grid-margin">
                            <div class="rotate-img">
                              <img src="admin/<?php echo $item['banner_image']; ?>" alt="banner" class="img-fluid" />
                            </div>
                          </div>
                          <div class="col-sm-8 grid-margin">
                            <a href="?link=news_detail&n_id=<?php echo $item['id']; ?>" class="text-dark">
                              <h2 class="font-weight-600 mb-2 " style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo $item['title']; ?>
                              </h2>
                            </a>
                            <p class="fs-13 text-muted mb-0">
                              <span class="mr-2 badge badge-info font-weight-bold"><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?></span>
                            </p>
                            <p class="fs-11" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo $item['content']; ?>
                            </p>
                          </div>
                        </div>
                        <hr>
                      <?php } ?>
                      <div class="row">
                        <div class="col-6">
                          <ul class="pagination" style="padding-top:0px !important;">
                            <?php
                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút Trước
                            if ($current_page > 0 && $total_page > 1) {
                              echo '<li class="p-2"><a href="?link=news_list&page=' . ($current_page - 1) . '">Trước</a></li>';
                            } else {
                              echo '<li class="disabled p-2"><a href="#' . ($current_page - 1) . '">Trước </a></li>';
                            }
                            // Lặp khoảng giữa
                            for ($i = 0; $i < $total_page; $i++) {
                              // Nếu là trang hiện tại thì hiển thị thẻ span
                              // ngược lại hiển thị thẻ a
                              if ($i !== $current_page) {
                                echo '<li class="active"><a class="btn btn-outline-secondary" href="?link=news_list&page=' . $i++ . '">' . $i++ . '</a></li>';
                              } else echo '<li><a class="btn btn-outline-secondary" href="?link=news_list&page=' . $i++ . '">' . $i++ . '</a></li>';
                            }
                            if ($current_page < $total_page && $total_page > 1) {
                              echo '<li class="p-2"><a href="?link=news_list&page=' . ($current_page + 1) . '">Sau</a></li>';
                            } else
                              echo '<li class="disabled p-2"><a href="#' . ($current_page + 1) . '">Sau</a></li>';
                            ?>
                          </ul>
                        </div>
                        <?php
                        echo '<div class="col-6"><p class = "float-right text-info">Trang ' . ($current_page + 1) . '/' . $total_page . '</p></div>';
                        ?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-lg-4">
                    <h2 class="mb-4 text-primary font-weight-600">
                      Tin tức mới nhất
                    </h2>
                    <?php if (count($viewParams['news']) > 0) {
                      $cnt = 0;
                      foreach ($viewParams['news'] as $item) {
                        if ($cnt > 5) break;
                        $cnt++; ?>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="border-bottom pb-4 pt-4">
                              <div class="row">
                                <div class="col-sm-8">
                                  <a href="?link=news_detail&n_id=<?php echo $item['id']; ?>" class="text-dark">
                                    <h5 class="font-weight-600 mb-1">
                                      <?php echo substr($item['title'], 0, 60); ?>
                                    </h5>
                                  </a>
                                  <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2 badge badge-info font-weight-bold"><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?></span>
                                  </p>
                                </div>
                                <div class="col-sm-4">
                                  <div class="rotate-img">
                                    <img src="admin/<?php echo $item['banner_image']; ?>" alt="banner" class="img-fluid" />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php }
                    } ?>
                    <div class="trending">
                      <h2 class="mb-4 text-primary font-weight-600">
                        Chủ đề
                      </h2>
                      <?php
                      if (count($viewParams['categories']) > 0)
                        foreach ($viewParams['categories'] as $item) {
                      ?>
                        <div class="mb-4">
                          <a href="?link=news_list&cate_id=<?php echo $item['id']; ?>" class="text-dark">
                            <h3 class="mt-3 font-weight-600">
                              <?php echo $item['name']; ?>
                            </h3>
                          </a>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2 badge badge-info font-weight-bold"><?php echo date('d/m/Y H:i:s', strtotime($item['update_at'])); ?></span>
                          </p>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
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