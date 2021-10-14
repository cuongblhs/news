<!-- partial:partials/_navbar.html -->
<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a class="navbar-brand" href="#"
                        ><img style="max-height: 60px; max-width: 60px" src="assets/images/news_logo.png" alt=""
                            /></a>
                    </div>

                    <div>
                        <button
                                class="navbar-toggler"
                                type="button"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                                class="navbar-collapse justify-content-center collapse"
                                id="navbarSupportedContent"
                        >
                            <ul
                                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                            >
                                <li>
                                    <button class="navbar-close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="./index.php">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown mr-2 ml-2">
                                    <a class="dropdown-toggle text-white text-uppercase" id="dropdownMenuButton"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Chủ đề</a>
                                    <ul class="dropdown-menu" style="background-color: #3f317b; text-align:center;"
                                        aria-labelledby="dropdownMenuButton">
                                        <?php
                                        if (count($viewParams['categories']) > 0) {
                                            foreach ($viewParams['categories'] as $item) { ?>
                                                <li class="nav-item active mb-2">
                                                    <a class="dropdown-item nav-link"
                                                       href="?link=news_list&cate_id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                                                </li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="?link=news_list">Tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?link=about_us" class="nav-link">Giới thiệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <form action="?link=news_list" method="get">  -->
                        <input class="form-control" type="text" id="search" name="search" placeholder="Tìm kiếm .." style="height: 20px !important; padding-left: 2%;"/>
                        <!-- <input type="submit" name="btn" value="search" /> -->
                    </form>
                </div>
            </div>

        </nav>
    </div>
</header>