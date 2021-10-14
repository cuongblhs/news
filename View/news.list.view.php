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
                  <div class="col-sm-12">
                    <h3 class="font-weight-600 mb-2 text-uppercase">
                      <?php echo $viewParams['label']; ?>
                    </h3>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-8">
                    <?php
                    if ($viewParams['total_news'] > 0) {
                      $sum = $viewParams['total_news'];
                      $limit = 5;
                      $tmp = $sum / $limit;
                      $total_page = ceil($tmp);

                      if (isset($_GET['page'])) $current_page = $_GET['page'];
                      else $current_page = 1;
                      $cnt = 0;

                      foreach ($viewParams['news'] as $item) { ?>
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
                        <ul class="pagination" style="padding:0px !important;">
                          <?php
                          
                          // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                          if ($current_page > 1 && $total_page > 1) {
                            echo '<li class="page-item" ><a class="page-link" style="padding: 10px 20px !important;" href="index.php?link=news_list&page=' . ($current_page - 1) . '">Trước</a></li> ';
                          }

                          // Lặp khoảng giữa
                          for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                              echo '<li class="page-item active"><a class="page-link text-white" style="padding: 10px 20px !important;" href="#">' . $i . '</a></li>';
                            } else {
                              //nếu page < 1 => vào page 1
                            // if ($current_page < 1) {
                            //   echo '<li class="page-item active"><a class="page-link text-white" href="index.php?link=news_list&page=1">1</a></li> ';
                            // }
                            //   else  //nếu current_page > total_page => vào trang total_page
                            //   if ($current_page > $total_page) {
                            //     echo '<li class="page-item active"><a class="page-link text-white" href="index.php?link=news_list&page=' . $total_page . '">'.$total_page.'</a></li> ';
                            //   }
                               echo '<li class="page-item "><a class="page-link" style="padding: 10px 20px !important;" href="?link=news_list&page=' . $i . '">' . $i . '</a></li>';
                            }
                          }

                          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                          if ($current_page < $total_page && $total_page > 1) {
                            echo '<li class="page-item"><a class="page-link" style="padding: 10px 20px !important;" href="index.php?link=news_list&page=' . ($current_page + 1) . '">Tiếp</a></li> ';
                          }
                          ?>
                        </ul>
                        <?php
                        echo '<div class="p-2 float-right"><p class = "float-right text-info">Trang ' . ($current_page) . '/' . $total_page . '</p></div>';
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
