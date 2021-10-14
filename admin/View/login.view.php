<?php if(!defined('__CONTROLLER__')) return; ?>
<?php 
getTemplate("header", $viewParams); ?>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <div class="limiter">
                <div class="container-login100" style="background-image: url('./dist/img/login-bg.jpg');">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="POST" action="?action=loginAct">
                            <img class="login100-form-logo" src="./dist/img/news_logo.png" >

                            <span class="login100-form-title p-b-34 p-t-27">
                                Đăng nhập Admin
                            </span>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control text-white" autocomplete="off" name="username">
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control text-white" name="password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" name="loginBtn">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- ./wrapper -->
    </body>
</html>