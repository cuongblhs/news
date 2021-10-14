<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./../" class="brand-link text-center font-weight-600">

        <span class="brand-text font-weight-light text-center  font-weight-600">Báo điện tử</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./dist/img/avatar.png" class="img-circle elevation-2" alt="Avatar">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION["news_user"] ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="?link=home" class="nav-link  ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text-uppercase font-weight-bold">
                            Trang chủ
                            <span class="right badge badge-danger">Mới</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?link=authors" class="nav-link  ">
                        <i class="nav-icon fas fa-users"></i>
                        <p class="text-uppercase font-weight-bold">
                            Quản lý tài khoản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?link=news" class="nav-link  ">
                        <i class="nav-icon fas fa-book"></i>
                        <p class="text-uppercase font-weight-bold">
                            Quản lý tin tức
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?link=category" class="nav-link  ">
                        <i class="nav-icon fas fa-clone"></i>
                        <p class="text-uppercase font-weight-bold">
                            Quản lý chủ đề
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?link=comment" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p class="text-uppercase font-weight-bold">
                            Quản lý bình luận
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php getModal("delete.author", $viewParams) ?>
<?php getModal("add.author", $viewParams) ?>
<?php getModal("update.author", $viewParams) ?>
<?php getModal("change.password", $viewParams) ?>

<?php getModal("delete.category", $viewParams) ?>
<?php getModal("update.category", $viewParams) ?>
<?php getModal("add.category", $viewParams) ?>

<?php getModal("delete.comment", $viewParams) ?>

<?php getModal("delete.news", $viewParams) ?>