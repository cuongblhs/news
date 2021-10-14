<!-- partial:partials/_footer.html -->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="assets/images/news_logo.png" class="footer-logo" alt=""/>
                    <h5 class="font-weight-normal mt-4">
                        © Copyright 2021 – Demo
                    </h5>
                    <h5 class="font-weight-normal mt-2 mb-5">Trường công nghệ thông tin và truyền thông Thái Nguyên</h5>
                    <ul class="social-media mb-3">
                        <li>
                            <a href="#">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3">Tin tức gần đây</h3>
                    <?php
                    $newsFooter = $viewParams["news"];
                    $last = count($newsFooter) > 3 ? 3 : count($viewParams["news"]);
                    for ($i = 0; $i < $last; $i++) {
                        ?>
                        <div class="row">
                            <a href="?link=news_detail&n_id=<?php echo $newsFooter[$i]['id']; ?>">
                                <div class="col-sm-12">
                                    <div class="footer-border-bottom pb-2">
                                        <div class="row">
                                            <div class="col-3">
                                                <img
                                                        src="<?= "admin/" . $newsFooter[$i]["banner_image"] ?>"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                />
                                            </div>
                                            <div class="col-9">
                                                <h5 class="font-weight-600">
                                                    <?= $newsFooter[$i]["title"] ?>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3 text-uppercase">Chủ đề</h3>
                    <?php
                    if (count($viewParams['categories']) > 0) {
                        $cnt = 0;
                        foreach ($viewParams['categories'] as $item) {
                            $cnt++; ?>
                            <div class="footer-border-bottom pb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 font-weight-600"><?php echo $item['name']; ?></a></h5>
                                    <div class="count"><?php echo $cnt; ?></div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="fs-14 font-weight-600">
                            © 2021 @ <a href="#" target="_blank" class="text-white"> Demo</a>. All rights reserved.
                        </div>
                        <div class="fs-14 font-weight-600">
                            Develope by <a href="" target="_blank" class="text-white">Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- partial -->

<!-- REQUIRED SCRIPTS -->
<!-- inject:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="assets/js/demo.js"></script>
<script src="assets/js/jquery.easeScroll.js"></script>
<!-- End custom js for this page-->
<script>
    $('#search').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            var key = document.getElementById("search").value;
            window.location.href = "?link=news_list&search=" + key;
            // console.log("keypress");
        }
    });
</script>

</body>

</html>