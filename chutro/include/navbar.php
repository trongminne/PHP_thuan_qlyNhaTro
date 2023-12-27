<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="mode_dieukhien">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top customlogo" id="mode_logo">
                <a class="sidebar-brand brand-logo " href="/index.php">SAO ĐỎ</a>
                <!-- logo -->
                <a class="sidebar-brand brand-logo-mini" href="/index.php">S</a>
            </div>
            <ul class="nav">


                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="../public/assets/images/icon.admin.jpg" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    <?php
                                    if (isset($_SESSION['taikhoan'])) {
                                        echo $_SESSION['taikhoan'];
                                    }
                                    ?>
                                </h5>
                                <span><?php echo number_format($_SESSION['coin'], 0, ',', '.'); ?> đ</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">

                            <?php if (isset($_SESSION['taikhoan'])) { ?>
                                <a href="login/logout.php?logout" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Đăng xuất</p>
                                    </div>
                                </a>
                            <?php } ?>

                            <a href="login/login.php" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <?php if (isset($_SESSION['taikhoan'])) { ?>
                                            <i class="mdi mdi-tumblr-reblog text-primary"></i>
                                        <?php } else { ?>
                                            <i class="mdi mdi-account text-primary"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <?php if (isset($_SESSION['taikhoan'])) { ?>
                                        <p class="preview-subject ellipsis mb-1 text-small">Chuyển tài khoản</p>
                                    <?php } else { ?>
                                        <p class="preview-subject ellipsis mb-1 text-small">Đăng nhập</p>
                                    <?php } ?>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Menu</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../public/index.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Bảng điều khiển</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Thêm dữ liệu</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                           
                            <li class="nav-item"> <a class="nav-link" href="./add_nhatro.php"><span class="hover_add" style="color: #6C7293;">Nhà trọ</span></a></li>
                            <li class="nav-item"> <a class="nav-link" href="./add_tintuc.php"><span class="hover_add" style="color: #6C7293;">Tin tức</span></a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row" id="mode_Navbar">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center" style="width: 0px;">
                    <a class="navbar-brand brand-logo-mini" id="mode_logomini" href="/index.php">SAO ĐỎ UNIVERSITY</a>

                    <!-- logomini -->
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch" id="">

                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100" id="">
                        <li class="nav-item w-100">
                            <form method="GET" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" name="key" class="form-control" id="mode_search" placeholder="Tìm kiếm...">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">

                        <!-- Dark mode -->

                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator " href="#">
                                <i class="mdi mdi-weather-sunny" id="toggleLight"></i>
                            </a>

                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="login/login.php" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../public/assets/images/icon.admin.jpg" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        <?php
                                        if (isset($_SESSION['taikhoan'])) {
                                            echo $_SESSION['taikhoan'];
                                        } else {
                                            echo 'Đăng nhập';
                                        }
                                        ?>
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">

                                </a>
                                <div class="dropdown-divider"></div>

                                <!-- Đăng xuất -->
                                <?php if (isset($_SESSION['taikhoan'])) { ?>

                                    <a href="login/logout.php?logout" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">
                                                Đăng xuất
                                            </p>

                                        </div>
                                    </a>
                                <?php } ?>
                                <!-- Đăng nhập -->

                                <a href="login/login.php" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">

                                            <?php if (!isset($_SESSION['taikhoan'])) { ?>
                                                <i class="mdi mdi-account text-primary"></i>
                                            <?php } else { ?>
                                                <i class="mdi mdi-tumblr-reblog text-primary"></i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <?php if (!isset($_SESSION['taikhoan'])) { ?>
                                            <p class="preview-subject mb-1">
                                                Đăng nhập
                                            </p>
                                        <?php } else { ?>
                                            <p class="preview-subject mb-1">
                                                Chuyển tài khoản
                                            </p>
                                        <?php } ?>
                                    </div>
                                </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>