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
                    <div class="col-sm-12">
                        <div class="card" data-aos="fade-up">
                            <div class="card-body">

                                    <h1 class="mt-5">
                                        Giới thiệu
                                    </h1>
                                    <p class=" fs-15">
                                        Báo điện tử là kênh tin của tập đoàn Trần Hoàng. Báo điện tử là trang báo điện
                                        tử
                                        chính thống hàng đầu tại Việt nam, luôn có mặt trong top 3 trang web có lượng
                                        truy cập lớn, với các đối tưởng trẻ tuổi. Nội dung báo tập trung vào các thông
                                        tin nóng, tin tức về giải trí, phim ảnh, âm nhạc, thể thao.

                                        Đối tượng độc giả chủ yếu là học sinh, sinh viên có độ tuổi từ 18 đên 24, Giới
                                        tinh hơn 60% là Nam, hơn 38% là Nữ tập trung nhiều ở các thành phố lớn như TP
                                        HCM, Hà Nội. Đây là một lượng độc giả rất chất lượng và là nguồn khách hàng tiềm
                                        năng cho các doanh nghiệp khai thác quảng cáo, PR trên kênh báo điện tử
                                    </p>
                                    <p class="font-weight-600 fs-16 mb-1 mt-4">Mọi chi tiết xin liên hệ:</p>
                                    <li class=" fs-15 pb-1">Tên : Trần Hoàng</li>
                                    <li class=" fs-15 pb-1">SDT: +84 358899159</li>
                                    <li class=" fs-15 mb-5">Địa chỉ: 7 Đội Cấn, Trưng Vương, Thành phố Thái Nguyên, Thái Nguyên</li>

                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3709.7181889349795!2d105.83913451540809!3d21.596920673513903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313526ef848a037f%3A0xc3893fac79e1f5b3!2zQ2hpIEPhu6VjIFRodeG6vyBUaMOgbmggUGjhu5EgVGjDoWkgTmd1ecOqbg!5e0!3m2!1svi!2s!4v1632754903981!5m2!1svi!2s"
                                        width="100%" height="600" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller ends -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- topbar -->
<?php getTemplate("footer", $viewParams); ?>