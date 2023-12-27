<?php
require './include/security.php';
require './include/connect.php';
require './include/head.php';

// Xuất bảng khu vực
$nhatro = mysqli_query($conn, "SELECT nhatro.*, COUNT(lichsu_dat.id) AS count_don FROM nhatro LEFT JOIN lichsu_dat ON nhatro.id_nhatro = lichsu_dat.id_nhatro WHERE nhatro.soluong > 1 AND nhatro.id_khuvuc = 11 GROUP BY nhatro.id_nhatro");

$nhatro1 = mysqli_query($conn, 'SELECT * FROM nhatro WHERE soluong > 1');
$tintuc = mysqli_query($conn, 'SELECT * FROM tintuc');
$khuvuc = mysqli_query($conn, 'SELECT * FROM khuvuc');

// ý nghĩa câu truy vấn trên:
// Tạo 1 cột name_cate giữa 2 thuộc tính id_cate của bảng product và id của category

// Bước 1: Tính tổng số bản ghi

$total = mysqli_num_rows($nhatro1);

// Bước 2: Số bản ghi / 1 trang

$limit = 12;

// Bước 3: Tính số trang

$page = ceil($total / $limit);

// Bước 4: Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Bước 5: Tính start

$start = ($cr_page - 1) * $limit;

// Bước 6 query dữ liệu limit

$nhatro1 = mysqli_query($conn, "SELECT nhatro.*, COUNT(lichsu_dat.id) AS count_don FROM nhatro LEFT JOIN lichsu_dat ON nhatro.id_nhatro = lichsu_dat.id_nhatro WHERE nhatro.soluong > 0 GROUP BY nhatro.id_nhatro LIMIT $start, $limit");

?>

<!DOCTYPE html>
<html>


<title>Nhà trọ sinh viên Đại học Sao Đỏ</title>

<body>

    <div class="page-body-buong">
        <style type="text/css" media="screen">
            #footer-site .top-footer .item .nav-item-adress ul li .fa-facebook-f {
                background: #0E8DF2;
            }

            #footer-site .top-footer .item .nav-item-adress ul li .fa-twitter {
                background: #00ACF0;
            }

            #footer-site .top-footer .item .nav-item-adress ul li .fa-instagram {
                background: #AE35BA;
            }

            #footer-site .top-footer .item .nav-item-adress ul li .fa-youtube {
                background: #D12E2E;
            }

            #footer-site .top-footer .item .nav-item-adress ul li .fa-google {
                background: #DB4F48;
            }

            .css-icon-plus {
                padding: 10px;
                position: absolute;
                right: 0px;
                display: none;
                top: 0px;
            }

            .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title {
                position: relative;
            }

            .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title:after {
                content: "\f067";
                font-size: 13px;
                /* color: rgba(255,235,59,.64); */
                font: normal normal normal 14px/1 FontAwesome;
                position: absolute;
                right: 10px;
                top: 12px;
                transition: all .3s;
            }

            .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title.show:after {
                content: "\f068";
            }

            .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-group {
                display: none;
            }

            @media (max-width: 768px) {
                .mobile-display-none {
                    display: none;
                }

                .css-icon-plus {
                    display: block;
                }

                .vertical-dropdown-menu {
                    display: none;
                }

                /* .slider-large .item img {
                height: auto !important;
            } */

                .slider-large .owl-prev {
                    right: 0px;
                    background: transparent;
                    width: 27px;
                    height: 27px;
                }

                .slider-large .owl-next {
                    right: 0px;
                    background: transparent;
                    width: 27px;
                    height: 27px;
                }

                .slider-large .owl-nav i {
                    width: 27px;
                    height: 27px;
                    line-height: 27px;
                }

                .content-detail-new img {
                    height: auto !important;
                    width: 100% !important;
                }
            }

            .content-product .nav-product .add-cart {
                transform: scale(0, 0);
                position: absolute;
                bottom: 45px;
                width: 100%;
                text-align: center;
                transition: .3s;
            }

            .content-product.home-first .nav-product .add-cart {
                bottom: 25px;
            }

            .content-product .nav-product .item-product {
                display: flex;
                flex-direction: column;
                position: relative;
            }

            .content-product .nav-product .item-product:hover .add-cart {
                transform: scale(1, 1);
            }

            .content-product .nav-product .item-product:hover .price-c {
                transform: scale(0, 0);
            }

            .content-product .nav-product .item-product .price-c .price {
                padding: 0px;
            }

            .content-product .nav-product .item-product .price-c {
                order: 3;
                transition: .3s;
                text-align: left;
                font-family: Roboto, sans-serif;
                transform: scale(1, 1);
            }

            .content-product .nav-product .item-product .price-c * {
                font-family: 'Roboto-Bold' !important;
                font-weight: bold;
                font-size: 20px;
                text-shadow: 0px 0px #b2b2b2;
            }

            .content-product .nav-product .item-product .price-c .gia-cu {
                font-size: 16px;
                color: rgba(0, 0, 0, .2);
                font-family: 'Roboto', sans-serif !important;
                font-weight: 400;
            }

            .content-product .nav-product .item-product .price-c {
                position: relative;
            }

            .content-product .nav-product .item-product .price-c .sale-off-show {
                position: absolute;
                top: 17px;
                right: 0;
                background-image: url('public/images/sale1.png');
                background-size: contain;
                font-size: 11px;
                padding: 10px 0px;
                width: 35px;
                height: 35px;
                text-align: center;
            }

            #main-menu1 ul {
                display: inline;
            }

            #main-menu1 ul li {
                padding: 5px 0;
            }

            #main-menu1 ul li:hover {
                background: linear-gradient(#65562e -16%, #797143 47%, #787142 82%);
            }

            #main-menu1 ul li:hover p {
                color: #fff;
            }

            div.adfloat {
                top: 205px !important;
            }

            .content-product .nav-product .item-product .price-c .css-size-d {
                font-size: 17px;
            }

            .sidebar .nav-product-sb .item .price span.css-price-d {
                font-size: 14px;
                padding: 0px;
                color: #c80000;
                font-family: 'Roboto-Bold';
            }

            .sidebar .nav-product-sb .item .price {
                font-size: 15px;
            }

            @media (min-width: 768px) {
                .main-logo-shop>.container>.row>.col-md-2.col-xs-12 {
                    padding-left: 40px;
                    text-align: center;
                }
            }

            .main-slider .owl-prev,
            .main-slider .owl-next {
                background: initial;
            }

            .main-slider .owl-prev {
                display: block;
            }

            .main-slider .owl-nav i {
                background: initial;
            }

            .slider-sale .col-md-6.col-sm-6.col-xs-12.col-edit-2 {
                padding-left: 3px;
            }
        </style>
        <header id="header-site" class="header">
            <div class="wrapper cf">
                <nav id="main-nav">
                    <ul class="second-nav">
                        <li class="devices">
                            <a href="">
                                Trang chủ </a>
                        </li>
                        <li class="devices">
                            <a href="">
                                Giới thiệu </a>
                        </li>
                        <li class="devices">
                            <a href="danh-sach-nha-tro-dai-hoc-sao-do.html">
                                Nhà trọ</a>
                        </li>
                        <li class="devices">
                            <a href="./tintuc.php">
                                Tin tức </a>
                        </li>

                        <li class="devices">
                            <a href="#lienhe">
                                Liên hệ </a>
                        </li>
                        <li class="devices">
                            <a class="nav-link dropdown-toggle" href="login/dang-nhap-nha-tro-dai-hoc-sao-do.html">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php if (isset($_SESSION['taikhoan'])) {
                                        echo $_SESSION['taikhoan'];
                                    } else {
                                        echo 'Đăng nhập';
                                    } ?>

                                </span>

                                <img class="icon-login" src="./login/Images/undraw_profile.svg">
                            </a>
                        </li>
                        <?php if (isset($_SESSION['taikhoan'])) { ?>
                            <li class="devices" id="openModalBtn1">
                                <a href="#">
                                    Nạp tiền</a>
                            </li>
                        <?php } ?>

                        <!-- <li class="devices">
                            </span>
                        </li> -->
                        <li class="devices">
                            <a href="./login/changePass/update.php">
                                Đổi mật khẩu</a>
                        </li>
                        <li class="devices">
                            <a href="dang-ki-nha-tro-dai-hoc-sao-do.html">
                                Đăng kí</a>`
                        </li>

                        <li class="devices">
                            <a href="./login/quenpass/khoiphucpass.php">
                                Quên mật khẩu</a>`
                        </li>

                        <?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == 1) {
                            echo '<li class="devices">';
                            echo '<a href="./admin/public/index.php">
                            Panel admin</a>';
                            echo '</li>';
                        } ?>

                        <?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == 2) {
                            echo '</li>';
                            echo '<li class="devices">';
                            echo '<a href="./chutro/public/index.php">
                             Quản lý trọ</a>';

                            echo '</li>';
                        } ?>

                        <?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == 0) {
                            echo '</li>';
                            echo '<li class="devices">';
                            echo '<a href="./sinhvien/public/index.php">
                             Quản lý trọ</a>';

                            echo '</li>';
                        } ?>

                        <!-- ĐĂNG XUẤT -->

                        <?php if (isset($_SESSION['taikhoan'])) {
                            echo '<li class="devices">';
                            echo '<form action="./login/logout.php" method="POST">
                                <button type="submit" name="logout_btn" class="btn btn-primary">Đăng xuất</button> ';

                            echo $_SESSION['taikhoan'] . '</form>';
                            echo '</li>';
                        } ?>


                    </ul>
                </nav>
                <a class="toggle">
                    <span></span>
                </a>
            </div>
            <!-- end mobile -->
            <!-- nền head -->
            <div class="top-header up-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item-top left-top">
                                <ul class="ho-tro">
                                    <li><i class="fa fa-mobile"></i><a href="#" rel="nofollow"> Hỗ trợ trực tuyến</a>
                                        <ul class="ht-child">
                                            <li>
                                                <div class="title">
                                                    <h2><span style="font-family:Times New Roman,Times,serif;"><span style="font-size:20px;"><strong><span style="color:#ff0000;">HOTLINE: 0347726501 -
                                                                        0868.151.151</span></strong></span></span></h2>

                                                    <h4><span style="font-family:Times New Roman,Times,serif;"><strong><span style="color:#2c3e50;"><u>Bán Hàng
                                                                        Online:</u></span></strong></span></h4>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Mr. Sơn -
                                                            0347726501</span></p>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Mr. Mẫn -
                                                            0866.939.268</span></p>

                                                    <h4><span style="font-family:Times New Roman,Times,serif;"><strong><span style="color:#2c3e50;"><u>Hỗ Trợ Kĩ Thuật:
                                                                        024.6686.7777</u></span></strong></span></h4>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Mr. Hùng -
                                                            0946.587.894</span></p>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Mr. Bằng -
                                                            096.321.5665</span></p>

                                                    <h4><span style="font-family:Times New Roman,Times,serif;"><strong><u>Tiếp
                                                                    Nhận Trả Bảo Hành: 027.6686.7777</u></strong></span>
                                                    </h4>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Mr. Hùng -
                                                            0946.587.894</span></p>

                                                    <h4><span style="font-family:Times New Roman,Times,serif;"><strong><span style="color:#2c3e50;"><u>Kế Toán:
                                                                        024.6297.9999</u></span></strong></span></h4>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Ms. Nhung
                                                            - 09.3636.1269</span></p>

                                                    <p><span style="font-family:Times New Roman,Times,serif;">Ms. Vân
                                                            Anh - 097.360.1419</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item-top right-top">
                                <ul>
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="login/dang-nhap-nha-tro-dai-hoc-sao-do.html" id="userDropdown" quyen="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                <?php if (
                                                    isset($_SESSION['taikhoan'])
                                                ) {
                                                    echo $_SESSION['taikhoan'];
                                                } else {
                                                    echo 'Đăng nhập';
                                                } ?>
                                            </span>

                                            <img class="icon-login" src="./login/Images/undraw_profile.svg">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right text-popup-login " aria-labelledby="userDropdown">
                                            <?php if (
                                                !isset($_SESSION['taikhoan'])
                                            ) {
                                                echo '<a class="dropdown-item" href="login/dang-nhap-nha-tro-dai-hoc-sao-do.html">
                                               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                               Đăng nhập
                                                    </a>';
                                            } ?>

                                            <!-- Panel admin -->

                                            <?php if (isset($_SESSION['quyen'])) {
                                                if ($_SESSION['quyen'] == 1) {
                                                    echo '<a class="dropdown-item" href="./admin/public/index.php">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Panel admin
                                                </a>';
                                                }
                                            } ?>
                                            <?php if (isset($_SESSION['quyen'])) {
                                                if ($_SESSION['quyen'] == '2') {
                                                    echo '<a class="dropdown-item" href="./chutro/public/index.php">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                   Quản lý trọ
                                                </a>';
                                                }
                                            } ?>

                                            <?php if (isset($_SESSION['quyen'])) {
                                                if ($_SESSION['quyen'] == '0') {
                                                    echo '<a class="dropdown-item" href="./sinhvien/public/index.php">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Quản lý
                                                </a>';
                                                }
                                            } ?>
                                            <?php
                                            if (isset($_SESSION['taikhoan'])) {
                                                echo '<a id="openModalBtn" class="dropdown-item" href="#">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Nạp tiền
                                                </a>';
                                            }
                                            ?>



                                            <a class="dropdown-item" href="dang-ki-nha-tro-dai-hoc-sao-do.html">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Đăng kí
                                            </a>
                                            <a class="dropdown-item" href="./login/changePass/update.php">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Đổi mật khẩu
                                            </a>
                                            <a class="dropdown-item" href="./login/quenpass/khoiphucpass.php">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Quên mật khẩu
                                            </a>

                                            <?php if (isset($_SESSION['taikhoan'])) {
                                                echo '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
                                                echo '<form action="./login/logout.php" method="POST">
                                                <button type="submit" name="logout_btn" class="btn btn-primary magrin-logout">Đăng xuất</button> </form>';
                                            } ?>

                                            <!-- QUẢN TRỊ -->




                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-logo-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <a href="nha-tro-sinh-vien-dai-hoc-sao-do.html" class="logo"><img src="public/images/logo/logosdu.png">
                            </a>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <div class="search-shop-holine">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="search">
                                            <form action="timkiem.php" method="get" id="searchForm" class="form">
                                                <select name="khuvuc" id="" required>
                                                    <option value="">Khu vực - Đường</option>
                                                    <?php foreach ($khuvuc
                                                        as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_khuvuc'] ?>"><?php echo $value['tenkhuvuc'] ?></option>
                                                    <?php } ?>
                                                </select>
                                               
                                                <select name="gia" id="" required>
                                                    <option value="">Giá phòng</option>
                                                    <option value="300000-500000">300.000đ - 500.000đ</option>
                                                    <option value="500000-700000">500.000đ - 700.000đ</option>
                                                    <option value="700000-1000000">700.000đ - 1.000.000đ</option>
                                                </select>

                                                <select name="loai" id="" required>
                                                    <option value="">Loại phòng</option>
                                                    <option value="1">Khép kín</option>
                                                    <option value="0">Không khép kín</option>
                                                </select>
                                                <input type="submit" value="Tìm kiếm">
                                             
                                            </form>

                                        </div>
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <div class="holine">
                                            <span class="title-holine">Hotline</span>
                                            <span class="phone-holine">0347726501</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div id="main" class="wrapper">
            <div class="category-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12 col-edit-1">
                            <div class="relative-category">
                                <div class="top-category">
                                    <h3 class="title-category">DANH MỤC KHU VỰC<i class="fa fa-bars"></i></h3>
                                </div>
                                <div class="nav-category-home hello">
                                    <?php foreach ($khuvuc
                                        as $key => $value) : ?>
                                        <ul>
                                            <li>
                                                <a href="<?php echo $value['id_khuvuc'] . '-khu-vuc-' . makeUrl($value['tenkhuvuc']) . '.html' ?>" style="width: calc(100% - 30px);"><?php echo $value['tenkhuvuc']; ?></a>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12 col-edit-4">
                            <div id="main-menu1">
                                <ul>
                                    <li>
                                        <a href="danh-sach-nha-tro-dai-hoc-sao-do.html">
                                            <div class="nav_horizontal_item">

                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">NHÀ TRỌ
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#nhatrotieubieu">
                                            <div class="nav_horizontal_item">

                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">NHÀ TRỌ TIÊU BIỂU
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#lienhe">
                                            <div class="nav_horizontal_item">

                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">Liên hệ
                                                </div>
                                            </div>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="./tintuc.php">
                                            <div class="nav_horizontal_item">

                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">Tin Tức
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                #main-menu1 ul li {
                    position: relative;
                }

                #main-menu1 ul.sub-menu {
                    display: none;
                    position: absolute;
                    width: 250px;
                    background-color: #333333;
                    top: 100%;
                    z-index: 999999;
                    margin-top: 0px;
                    padding-top: 0px;
                }

                #main-menu1 ul.sub-menu i {
                    float: right;
                    color: #fff;
                }

                #main-menu1 ul.sub-menu.level3 {
                    top: 0%;
                    left: 100%;
                    display: none !important;
                }

                #main-menu1 ul.sub-menu li {
                    padding: 10px 15px;
                    border-bottom: 1px dashed #333333;
                }

                #main-menu1 ul.sub-menu li a {
                    color: #fff;
                }

                #main-menu1 ul.sub-menu li {
                    width: 100%;
                }

                #main-menu1 li:hover .sub-menu {
                    display: block;
                }

                #main-menu1 li:hover .sub-menu:hover {
                    display: block;
                }

                #main-menu1 ul.sub-menu li:hover ul.sub-menu.level3 {
                    display: block !important;
                }

                .hello {
                    display: block !important;
                }

                .css-icon-plus.cssssss {
                    display: block;
                }
            </style>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".top-category").click(function() {
                        $(".nav-category-home").slideToggle();
                    });
                });
            </script>
            <div class="slider-sale">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-edit-1">

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 col-edit-2 pr-1">


                            <div class="main-slider">
                                <div class="slider-large owl-carousel">
                                    <div class="item" data-hash="one0">
                                        <a href="https://saodo.edu.vn/"> <img src="public/images/slide/dhsd.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="item" data-hash="one1">
                                        <a href="#"> <img src="public/images/slide/a1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="item" data-hash="one2">
                                        <a href="#"> <img src="public/images/slide/a2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="item" data-hash="one3">
                                        <a href="#"> <img src="public/images/slide/a3.jpg" alt="RTX 3000 Series">
                                        </a>
                                    </div>
                                    <div class="item" data-hash="one4">
                                        <a href="#"> <img src="public/images/slide/a4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="item" data-hash="one5">
                                        <a href="#"> <img src="public/images/slide/a5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="item" data-hash="one6">
                                        <a href="#"> <img src="public/images/slide/a6.jpg" alt="">
                                        </a>
                                    </div>

                                </div>
                                <div class="slider-small owl-carousel">
                                    <a href="#one0"> <span class="transforn"></span> ĐẠI HỌC SAO ĐỎ </a>
                                    <a href="#one1"> <span class="transforn"></span> AN NINH </a>
                                    <a href="#one2"> <span class="transforn"></span> NGUYỄN HUỆ </a>
                                    <a href="#one3"> <span class="transforn"></span> NGUYỄN THỊ DUỆ </a>
                                    <a href="#one4"> <span class="transforn"></span> CHU VĂN AN </a>
                                    <a href="#one5"> <span class="transforn"></span> THÁI HỌC 1 </a>
                                    <a href="#one6"> <span class="transforn"></span> THÁI HỌC 2 </a>
                                </div>
                            </div>
                            <style type="text/css">
                                .slider-small .owl-item:nth-of-type(odd)>a {
                                    background: -webkit-radial-gradient(center center, circle farthest-side, #5f5a5a 14%, #000 100%);
                                }

                                .slider-small .owl-item:nth-of-type(even)>a {
                                    background: -webkit-radial-gradient(center center, circle farthest-side, #f2e386 14%, #ccb05e 100%);
                                    color: black;
                                }
                            </style>
                        </div>  
                        <div class="col-md-3 col-sm-3 col-xs-12 col-edit-3 mobile-display-none">

                            <iframe width="100%" height="160" src="https://www.youtube.com/embed/D2siV-h18KI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="sale" style="margin-top: 3.9px;">
                                <a href="#"><img src="public/images/nha_b.jpg" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <section class="top-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-9 col-sm-9 col-xs-12 fade-left animated fadeInLeft col-edit-4">
                            <div class="left-product">
                                <div class="content-product home-first">
                                    <div class="title-primary wow fadeInUp">
                                        <a href="danh-sach-nha-tro-dai-hoc-sao-do.html">
                                            <h3 class="title1" id="nhatrotieubieu">NHÀ TRỌ GẦN TRƯỜNG</h3>
                                        </a>

                                    </div>
                                    <div class="nav-product">
                                        <div class="row">

                                            <div id="product-sale-home" class='owl-carousel'>
                                                <?php foreach ($nhatro as $key => $value) { ?>

                                                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">

                                                        <div class="item-product">
                                                            <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>">
                                                                <div class="content card">

                                                                    <div class="tools">
                                                                        <div class="circle">
                                                                            <span class="red box"></span>
                                                                        </div>
                                                                        <div class="circle">
                                                                            <span class="yellow box"></span>
                                                                        </div>
                                                                        <div class="circle">
                                                                            <span class="green box"></span>
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="top_popup chan_tc tenchu">Chủ:
                                                                        <?php echo $value['tenchu'] ?>
                                                                    </h2>
                                                                    <p class="chan_dc diachi"> Địa chỉ:
                                                                        <?php echo $value['diachi'] ?> </p>
                                                                    <p style="font-size: 15px;"><a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>"><span style="color: #fff;">Nhấp chuột để xem chi
                                                                                tiết</span></a></p>
                                                                </div>
                                                            </a>

                                                            <div class="image">
                                                                <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img"><img loading="lazy" src="./chutro/public/upload/<?php echo $value['image']; ?>" alt="" height="500">

                                                                    <!-- ảnh 1024x1024 -->

                                                                </a>
                                                                <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img" data-link-action="quickview">

                                                                </a>


                                                            </div>
                                                            <div class="price-c">
                                                                <p class="price"><span class="">Phòng trống: <?php echo $value['soluong'] ?> </span>

                                                                    <br>
                                                                    <span class="gia-moi">

                                                                        <span class="css-size-d">Giá: <?php echo number_format($value['price'], 0, ',', '.') . ' vnđ'; ?></span></span>
                                                                </p>


                                                                <div class="sale-off-show">

                                                                </div>
                                                            </div>
                                                            <h3 class="title paddingtop-tensp"><a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img">Đã thuê: <?php echo $value['count_don'] ?> </a>
                                                            </h3>

                                                        </div>
                                                    </div>

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 fade-Right animated fadeInRight col-edit-3 mobile-display-none">
                            <div class="right-new">
                                <div class="title-primary">
                                    <a href="./tintuc.php">
                                        <h3 class="title1">Tin tức nhà trọ</h3>
                                    </a>

                                </div>
                                <div class="nav-right-new nav-right-new1 ">

                                    <?php foreach ($tintuc
                                        as $key => $value) { ?>

                                        <div class="item">
                                            <div class="image">
                                                <a href="./tintuc/show_tintuc.php?id=<?php echo $value['id']; ?>"><img src="./chutro/public/upload/<?php echo $value['image']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="nav-img">
                                                <h3 class="title"><a href="./tintuc/show_tintuc.php?id=<?php echo $value['id']; ?>">
                                                        <?php echo $value['tieude']; ?></a></h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </section>
        <section class="main-content main-content1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="nav-main-content nav-main-content1">
                            <div class="content-product">
                                <div class="title-primary wow fadeInUp">
                                    <a href="danh-sach-nha-tro-dai-hoc-sao-do.html">
                                        <h3 class="title1">NHÀ TRỌ </h3>
                                    </a>

                                </div>
                                <div class="nav-product">
                                    <div class="row">
                                        <?php foreach ($nhatro1
                                            as $key => $value) { ?>


                                            <div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp">
                                                <div class="item-product">
                                                    <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>">
                                                        <div class="content1 card">

                                                            <div class="tools">
                                                                <div class="circle">
                                                                    <span class="red box"></span>
                                                                </div>
                                                                <div class="circle">
                                                                    <span class="yellow box"></span>
                                                                </div>
                                                                <div class="circle">
                                                                    <span class="green box"></span>
                                                                </div>
                                                            </div>
                                                            <h2 class="top_popup chan_tc tenchu1"> Chủ:
                                                                <?php echo $value['tenchu'] ?>
                                                            </h2>
                                                            <p class="chan_dc diachi"> Địa chỉ:
                                                                <?php echo $value['diachi'] ?> </p>
                                                            <p style="font-size: 15px;"><a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>"><span style="color: #fff;">Nhấp chuột để xem chi
                                                                        tiết</span></a></p>
                                                        </div>
                                                    </a>
                                                    <div class="image">
                                                        <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img"><img loading="lazy" src="./chutro/public/upload/<?php echo $value['image']; ?>" alt="">
                                                        </a>
                                                        <a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img" class="quick-view" data-link-action="quickview">
                                                        </a>

                                                    </div>
                                                    <div class="price-c mg-768-nhatro">
                                                        <p class="price"><span>Phòng trống: <?php echo $value['soluong'] ?></span>
                                                            <br><span class="gia-moi">
                                                                Giá:
                                                                <?php
                                                                echo number_format($value['price'], 0, ',', '.');
                                                                ?>
                                                                <span class="css-size-d"> vnđ</span></span>
                                                        </p>
                                                    </div>
                                                    <h3 class="title paddingtop-tensp mg-768-nhatro"><a href="<?php echo $value['id_nhatro'] . '-nha-tro-dai-hoc-sao-do-' . makeUrl($value['name']) . '.html' ?>" class="thubmail-img">Đã thuê: <?php echo $value['count_don'] ?></a></h3>

                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>


                                    <!-- phân trang -->
                                    <?php if ($total > 12) { ?>

                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">


                                                <?php if ($cr_page - 1 > 0) { ?>
                                                    <li class="page-item"><a class="page-link" href="./index.php?page=<?php echo $cr_page - 1 ?>">Trước</a></li>
                                                <?php } ?>


                                                <?php for ($i = 1; $i <= $page; $i++) {
                                                    if ($i > $cr_page - 3 && $i < $cr_page + 3) { ?>
                                                        <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link" href="./index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                                <?php }
                                                } ?>
                                                <?php if ($cr_page < $page) { ?>
                                                    <li class="page-item"><a class="page-link" href="./index.php?page=<?php echo $cr_page + 1 ?>">Sau</a></li>
                                                <?php } ?>

                                            </ul>
                                        </nav>
                                    <?php } ?>


                                    <!-- CSS popup -->

                                    <style>
                                        .tenchu {
                                            color: #ffff;
                                            -webkit-line-clamp: 1;
                                        }

                                        .tenchu1 {
                                            color: #ffff;
                                            -webkit-line-clamp: 1;
                                        }

                                        .diachi {
                                            color: #ffff;
                                            -webkit-line-clamp: 1;
                                        }

                                        .card {

                                            margin: 0 auto;
                                            background-color: #011522;
                                            border-radius: 8px;
                                            z-index: 1;
                                        }

                                        .tools {
                                            display: flex;
                                            align-items: center;
                                            padding: 9px 0 20px 0;
                                        }

                                        .circle {
                                            padding: 0 4px;
                                        }

                                        .box {
                                            display: inline-block;
                                            align-items: center;
                                            width: 12px;
                                            height: 12px;
                                            padding: 1px;
                                            border-radius: 50%;
                                        }

                                        .red {
                                            background-color: #ff605c;
                                        }

                                        .yellow {
                                            background-color: #ffbd44;
                                        }

                                        .green {
                                            background-color: #00ca4e;
                                        }



                                        .item-product .content {

                                            position: absolute;
                                            font-size: 20px;
                                            left: 90px;
                                            height: 217px;
                                            width: 200px;
                                            background: #021623;

                                            padding: 15 20px 20px 20px;
                                            box-sizing: border-box;
                                            border-radius: 4px;
                                            visibility: hidden;
                                            opacity: 0;
                                            z-index: 1000;
                                            transition: 0.5s;
                                            transform: translateX(-50%) translateY(50px);
                                            overflow-wrap: break-word;
                                        }

                                        .item-product:hover .content {
                                            visibility: visible;
                                            opacity: 1;
                                            transform: translateX(-50%) translateY(0px);
                                        }



                                        .item-product .content1 {

                                            position: absolute;
                                            font-size: 20px;
                                            left: 135px;

                                            height: 210px;
                                            width: 290px;
                                            background: #021623;

                                            padding: 20px;
                                            box-sizing: border-box;
                                            border-radius: 4px;
                                            visibility: hidden;
                                            opacity: 0;
                                            z-index: 1000;
                                            transition: 0.5s;
                                            transform: translateX(-50%) translateY(50px);
                                            overflow-wrap: break-word;
                                        }

                                        .item-product .content1 .tools {
                                            display: flex;
                                            align-items: center;
                                            padding: 9px 0 25px 0;
                                        }

                                        .item-product:hover .content1 {
                                            visibility: visible;
                                            opacity: 1;
                                            transform: translateX(-50%) translateY(0px);
                                        }

                                        @media (max-width: 768px) {
                                            .mua-hang a {
                                                width: 100%;
                                            }

                                            .mg-768-nhatro {
                                                padding-left: 70px;
                                            }

                                            .pd-right-sale {
                                                margin-right: 17%;
                                            }

                                            .sale-768 {
                                                padding-top: 1%;
                                                margin-right: 17%;
                                            }



                                            .img-sale-768 {
                                                width: 50px;
                                            }

                                            .main-slider {
                                                margin-left: 10px;
                                            }

                                            .holine-footer {
                                                background: #ea4335;
                                                display: inline-block;
                                                width: 140px;
                                                padding: 6px 2px 6px 2px;
                                                border-radius: 4px 4px 0 4px;
                                                position: fixed;
                                                bottom: 52px;
                                                left: 57px;
                                                z-index: 11;
                                                margin-left: -33px;
                                            }

                                            .banner {

                                                position: relative;
                                                overflow: hidden;
                                                margin-top: 0px;
                                                margin-bottom: 0px;
                                                padding-top: 10px;
                                                height: 130px;
                                            }

                                            .banner a img {
                                                /* margin: 10px; */
                                                width: 600px;
                                                height: 70px;
                                                object-fit: cover;
                                            }

                                            .right-pc-position ul.social-footer li i {
                                                color: #000;
                                                color: #fff;
                                                width: 30px;
                                                height: 30px;
                                                border-radius: 50%;
                                                position: absolute;
                                                padding: 8px 11px;
                                                margin-top: -300px;
                                            }



                                            .item-product .content {

                                                position: absolute;
                                                font-size: 20px;

                                                left: 80px;
                                                height: 200px;
                                                width: 175px;
                                                background: #021623;
                                                padding: 20px;
                                                box-sizing: border-box;
                                                border-radius: 5px;
                                                visibility: hidden;
                                                opacity: 0;
                                                z-index: 1000;
                                                transition: 0.5s;
                                                transform: translateX(-50%) translateY(50px);
                                                overflow-wrap: break-word;
                                            }

                                            .item-product .content1 {

                                                position: absolute;
                                                font-size: 20px;
                                                left: 181px;

                                                height: 190px;
                                                width: 363px;
                                                background: #021623;

                                                padding: 20px;
                                                box-sizing: border-box;
                                                border-radius: 4px;
                                                visibility: hidden;
                                                opacity: 0;
                                                z-index: 1000;
                                                transition: 0.5s;
                                                transform: translateX(-50%) translateY(50px);
                                                overflow-wrap: break-word;
                                            }
                                        }
                                    </style>

                                    <!-- END CSS popup -->

                                    <div class="category-banner">
                                        <div class="banner">
                                            <a href=""><img alt="ads2" class="img-responsive" src="public/images/banner.png">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
    <style>
        .quick-view {
            font-size: 0;
            height: 38px;
            width: 42px;
            display: inline-block;
            vertical-align: top;
            -webkit-transition: none;
            -moz-transition: none;
            -o-transition: none;
            transition: none;
            background: #0d5a94 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAuCAYAAAAyVNlIAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAPnSURBVHja7JddiFVVFMd/+5xzPxoNZmy0D3q4EL5MTIJXER+SmyJ9jChDmBV9QEbRo88TPog4jh+DYKjNiyODDxoy1KQyERWlZKHQQ9lLb8akWakNCdf78e/Bdep0Zp+ZOzH1NAs2l7vW2v+19l7/vc7eThLTyCLgWeAp4FEgZ/oa8C0wDrwH3MwCcBkBFgN9wFbAAVeBr4EfgTzwEFAG7geawBDQD/w6BUlSerwq6YakuqQTklaafrGkDZJ6JHWabpWkk+Z7XdLzabzkn7yko7or5yR1mz6UtFdSTX/LHUm7JQXms0zSebMdkZRLB1go6WNJDUnbDTS2HbKJQ5IqNo6Zbl/CL5K0wzDOSGqLA7RJ+kzSpKTnUkvsltSU1O/ZykEDW5rSv2hYZyXlkTQi6XtJT3tA+iTdlrTAY2u3bdvmsfUa5uEAKAJfAGc9bHoQ+Bn4w2O7CfwCLPHYRoEvgfsC4DbwOLDR4/gT8ABwr8fWDnRaAmnZAqwGriKpKGnc9u3ljBoMZNSg7qnB1nQN4kK/b0UbMEbEtoPGmGFJ6yStTbBoT8IvJ+mAYYxKuid9DiLLqinpgnE7Pgc7JVUT56BqlHTmU5Z00ebuT9KcDAZMGENGbDKSOiStt9FhuuWSjpvvhKRNabysXtQOvA28CSwEfgAuAVesNz0MrAAeASaBw8Au4FarzS7ZTbcAG4DHjFECrgHfAGPWTW/MtpvOmQT8xzIfYD7AfID/IYCbzthqG3HOzS7Av+1PvkBBK+C+iT6dd+5MwDOtJssnTiCYTdaz2ZoYcyaUdqAX6AG6Ev4CvgPOAKeA36crcgg0UvpOu76/bv+vAV+lru8r7NIl4F27vv/Wyll4xT6BdeAEsDLxZugBnrEEAFYBJ833un1ep0hov3ngqGV0DuhO2Pfaq0Y27gC7E8ktA86b7UjiJXRXyuVym3PuI9uq7YmgAIds4hBQsXHMdPsSfhGwA2g45z4slUpFACqVStE59wkwGYbh5tTquu2J1O9Z+aAltPQf2xGGLwCTzrmxcrmcAxgGLkdR9KQHpM8uxwsyGFYDtqUNhUJhI3A5CIJ3AqCWy+U+rdfr43N1fa9Wqx+EYfh5s9lsC4CwVqs9USgUeubq+h6G4eZGo7EmiqJbdHV15Z1zp60GL2XUYCCjBnVPDV5L14BSqVR0zo1a0QaMEbEcNMYMA+uAtQkW7Un45YADxqJTf7EoRbNBy/iCcTs+BzuBauIcVI2ScesoAxdt7v4UzadILzBhDBmxyQAdwHobHaZbDhw33wlgU6tftDm7vs8ki4IgeAs4beA1axNXgLEgCN5IrMYrfw4A55yi+TWLtjUAAAAASUVORK5CYII=) no-repeat scroll 9px 12px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -19px;
            margin-left: -21px;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transform: scale(0, 0);
            -ms-transform: scale(0, 0);
            transform: scale(0, 0);
        }

        .quick-view .material-icons {
            display: none;
            font-size: 20px;
            margin: 7px 10px;
            color: #fff;
        }

        .nav-product .item-product:hover .quick-view {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            transform: scale(1, 1);
        }

        .nav-product .item-product .quick-view:hover {
            background-color: #ffe11b;
            /* background-position: 9px -19px; */
        }
    </style>

    <?php require './include/footer.php'; ?>


    <style type="text/css" media="screen">
        .wp-copy.text-center {
            text-align: center;
        }

        .holine-footer1:after {
            content: "";
        }

        .copy-right {
            width: 100%;
            display: inline-block;
            background: #111111;
            height: 44px;
            line-height: 44px;
            text-align: center;
            font-size: 14px;
            color: #bdbdbd;
            margin: 0;
            padding: 0;
        }

        .right-pc-position {
            position: fixed;
            bottom: 40%;
            right: 10px;
            z-index: 99999999;
        }

        @media (max-width: 1500px) {
            .right-pc-position {
                position: fixed;
                bottom: 10%;
                right: 10px;
                z-index: 99999999;
            }
        }

        .right-pc-position ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: inline-block;
        }

        .right-pc-position ul li {
            padding-bottom: 10px;
            width: 30px;
            height: 30px;
            position: relative;
            margin-bottom: 5px;
        }


        .right-pc-position ul li .fa-facebook-f {
            background: #0E8DF2;
        }

        .right-pc-position ul li .fa-twitter {
            background: #00ACF0;
        }

        .right-pc-position ul li .fa-instagram {
            background: #AE35BA;
        }

        .right-pc-position ul li .fa-youtube {
            background: #D12E2E;
        }

        .right-pc-position ul li .fa-google {
            background: #DB4F48;

        }

        body #divBannerFloatLeft {
            padding-right: 10px;
        }

        body #divBannerFloatRight {
            padding-left: 10px;
        }
    </style>



    <!-- Icon bên phải -->
    <div class="right-pc-position">
        <ul class="social-footer">
            <li><a href="https://www.facebook.com/TruongDHSaoDo/"><i class="fab fa-facebook-f index_icon"></i></a>
            </li>

            <li><a href="https://www.instagram.com/explore/locations/470772854/truong-ai-hoc-sao-o/"><i class="fab fa-instagram index_icon"></i></a>
            </li>

            <li><a href="https://saodo.edu.vn/"><i class="fab fa-google index_icon"></i></a>
            </li>
        </ul>
    </div>

    <style type="text/css" media="screen">
        i.fa.fa-plus.css-icon-plus.show:before {
            content: "\f107";
        }

        .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title:after,
        .fa.fa-plus.css-icon-plus:before {
            content: "\f105";
            font-weight: bold;
        }

        .fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title.show:after {
            content: "\f107";
        }
    </style>
    <script type="text/javascript" charset="utf-8" async defer>
        $('#main-menu1 > ul > li').attr('style', 'width: calc(100% / ' + $('#main-menu1 > ul > li').length + ')');

        if (jQuery(window).width() <= 768) {
            $('.main-slider').attr('style', "padding-top: " + $('.nav-category-home.hello').height() + "px");
            $('.css-icon-plus').click(function() {
                if (jQuery(this).next().css('display') == 'none') {

                    jQuery(this).next().attr('style',
                        'opacity: 1;display: block;visibility: inherit;position: inherit;left: 0px;');

                    // jQuery(this).next().css('display','block');

                    jQuery(this).addClass('show');

                } else {

                    jQuery(this).next().attr('style',
                        'opacity: 0;display: none;visibility: hidden;position: absolute;');
                    // jQuery(this).next().css('display','none');

                    jQuery(this).removeClass('show');

                }
                // $(this).parent().find('.vertical-dropdown-menu').attr('style', 'opacity: 1;display: block;visibility: inherit;');
            });
        }
        jQuery('.fillter_bl .content_fillter [class^="group-fillter fill-key-"] .attribute-title').click(function(e) {

            e.preventDefault();

            if (jQuery(this).next().css('display') == 'none') {

                jQuery(this).next().css('display', 'block');

                jQuery(this).addClass('show');

            } else {

                jQuery(this).next().css('display', 'none');

                jQuery(this).removeClass('show');

            }

            return false;

        });
    </script>



    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v4.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="165562137174332">
    </div>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '893478067706055');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=893478067706055&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <div id="modal-cart" class="modal fade" tabindex="-1" quyen="dialog">
        <div class="modal-dialog" style="max-width:768px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="cart-content"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/wow.min.js"></script>
    <script type="text/javascript" src="public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="public/js/BannerFloat.js"></script>
    <!-- <script type="text/javascript" src="public/js/cloud-zoom.js"></script> -->
    <script src="public/js/hc-offcanvas-nav.js?ver=3.3.0"></script>
    <script type="text/javascript" src="public/js/buong.js"></script>
    <script>
        //hieu ung wow------------------------------------------
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();
    </script>








    <style type="text/css">
        .buynow-2 {
            max-width: 740px;
            margin: 0 auto;
            background: #fff;
        }

        .buynow-2 .panel-head.mb15 {
            padding-right: 15px;
            margin-bottom: 20px;
        }

        .buynow-2 .heading {
            position: relative;
            cursor: pointer;
            padding-left: 40px;
            line-height: 0;
            margin: 0;
        }

        .buynow-2 .heading:before {
            content: "";
            position: absolute;
            width: 22px;
            height: 20px;
            left: 10px;
            top: 0;
            background-image: url(templates/backend/images/spritesheet.png);
            background-repeat: no-repeat;
            background-position: -459px -360px
        }

        .buynow-2 .heading .text {
            display: inline-block;
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            color: #555
        }

        .buynow-2 .heading .text:hover {
            color: #0388cd
        }

        .buynow-2 .panel-body {
            padding: 0;
        }

        .buynow-2 .list-cart-heading {
            width: 100%;
            background: #f7f7f7;
            font-size: 12px;
            color: #333;
            padding: 0
        }

        .buynow-2 .list-cart-heading .item {
            float: left;
            padding: 10px 15px;
            text-transform: none;
            font-weight: bold
        }

        .buynow-2 .list-cart-heading .item+.item {
            border-left: 1px solid #fff
        }

        .buynow-2 .list-cart-heading .product,
        .buynow-2 .list-order .product {
            width: 330px
        }

        .buynow-2 .list-cart-heading .price,
        .buynow-2 .list-order .price {
            width: 130px
        }

        .buynow-2 .list-cart-heading .count,
        .buynow-2 .list-order .count {
            width: 114px
        }

        .buynow-2 .list-cart-heading .prices,
        .buynow-2 .list-order .prices {
            width: 130px
        }

        .buynow-2 .list-order>.item {
            padding: 15px 0
        }

        .buynow-2 .list-order>.item+.item {
            border-top: 1px dotted #ccc
        }

        .buynow-2 .list-order .product .thumb {
            width: 80px;
            border: 1px solid #d8d8d8
        }

        .buynow-2 .list-order .price,
        .buynow-2 .list-order .prices {
            padding-right: 15px;
            font-size: 12px;
            font-weight: 700
        }

        .buynow-2 .list-order .prices span {
            font-size: 12px;
            margin-bottom: 5px;
            display: block
        }

        .buynow-2 .list-order .prices span.old {
            text-decoration: line-through;
            font-weight: normal;
            color: #777;
            font-style: italic;
        }

        .buynow-2 .list-order .prices span.saleoff {
            color: #fff;
            padding: 5px;
            display: inline-block;
            background-color: #c80000;
            border-radius: 5px;
            font-size: 11px;
        }

        .buynow-2 .list-order .list-item-cart>* {
            float: left
        }

        .buynow-2 .list-order .product .info {
            width: 250px;
            padding: 0 15px
        }

        .buynow-2 .list-order .product .info .title {
            font-size: 13px;
            line-height: 18px;
            font-weight: 700
        }

        .buynow-2 .list-order .product .info .title .link {
            color: #333;
            font-size: 12px
        }

        .buynow-2 .list-order .product .info .title .link:hover {
            color: #0388cd
        }

        .buynow-2 .list-order .product .delete {
            border: none;
            background: #fff;
            font-size: 11px;
            color: #6f0600;
            cursor: pointer;
            padding: 0
        }

        .buynow-2 .list-order .product .delete i {
            color: #959595;
            margin-right: 5px
        }

        .buynow-2 .list-order .price .old {
            text-decoration: line-through;
            color: #959595;
            font-weight: 400
        }

        .buynow-2 .list-order .price .saleoff {
            color: #d60c0c;
            font-weight: 400
        }

        .buynow-2 .list-order .count {
            text-align: center
        }

        .buynow-2 .list-order .count>* {
            display: inline-block;
            position: relative;
        }

        .buynow-2 .list-order .count .btns {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 1px solid #dfdfdf;
            top: 0;
            cursor: pointer
        }

        .buynow-2 .list-order .count .abate:before,
        .buynow-2 .list-order .count .augment:before {
            width: 12px;
            height: 2px;
            margin: 14px auto;
            content: "";
            display: block
        }

        .buynow-2 .list-order .count .abate {
            left: -30px;
            border-right: none
        }

        .buynow-2 .list-order .count .abate:before {
            background: #ccc
        }

        .buynow-2 .list-order .count .augment {
            right: -30px;
            border-left: none
        }

        .buynow-2 .list-order .count .augment:before {
            background: #288ad6
        }

        .buynow-2 .list-order .count .augment:after {
            content: "";
            width: 2px;
            height: 12px;
            background: #288ad6;
            display: block;
            margin: 0 auto;
            position: absolute;
            top: 9px;
            left: 0;
            right: 0
        }

        .buynow-2 .list-order .count .quantity {
            width: 30px;
            height: 30px;
            text-align: center;
            font-size: 12px;
            border: 1px solid #dfdfdf
        }

        .buynow-2 .panel-foot {
            padding: 15px 0px 0;
            font-size: 14px;
            line-height: 20px;
            color: #333;
            border-top: 1px solid #eee
        }

        .buynow-2 .panel-foot .total .price strong {
            color: #d60c0c
        }

        .buynow-2 .panel-foot .total p {
            font-size: 13px
        }

        .buynow-2 .panel-foot .action .continue {
            font-size: 13px;
            color: #0388cd;
            background-color: #f8f8f8;
            border: 1px solid #e8e8e8;
            line-height: 30px;
            padding: 0 10px;
            border-radius: 2px;
            cursor: pointer;
        }

        .buynow-2 .panel-foot .action .purchase {
            display: block;
            position: relative;
            padding: 8px 40px 8px 20px;
            background: #d60c0c;
            color: #fff;
            border: none;
            font-size: 13px;
            line-height: 20px;
            font-weight: 700;
            cursor: pointer;
            border-radius: 4px
        }

        .buynow-2 .panel-foot .action .purchase:after {
            content: "";
            display: block;
            position: absolute;
            width: 12px;
            height: 8px;
            background: url(templates/backend/images/spritesheet.png) -264px -81px no-repeat;
            top: 14px;
            right: 15px
        }

        #scrrolbar {
            max-height: 320px
        }

        #scrrolbar::-webkit-scrollbar {
            height: 100%;
            width: 6px
        }

        #scrrolbar::-webkit-scrollbar-thumb {
            background: #ccc;
            height: 10px;
            width: 7px;
            border-radius: 3px
        }

        #modal-cart .uk-modal-dialog {
            width: 740px !important;
            padding: 20px 0 10px !important
        }

        #modal-cart .uk-modal-dialog>.uk-close:first-child {
            margin: -16px -15px 0 0
        }

        .action.uk-flex.uk-flex-middle.uk-flex-space-between {
            width: 100%;
        }

        .cart-scrrolbar {
            max-height: 320px;
            overflow: auto;
        }

        .cart-scrrolbar::-webkit-scrollbar {
            height: 100%;
            width: 6px;
        }

        .cart-scrrolbar::-webkit-scrollbar-thumb {
            background: #ccc;
            height: 10px;
            width: 7px;
            border-radius: 3px;
        }

        #scrollbar {
            min-width: 700px;
        }

        .mt-scaledown,
        .mt-scaledown img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .mt-scaledown img {
            object-fit: scale-down
        }

        #modal-cart .modal-dialog {
            margin: 0;
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .mt-flex {
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex
        }

        .mt-flex-middle {
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center
        }

        .mt-flex-bottom {
            -ms-flex-align: end;
            -webkit-align-items: flex-end;
            align-items: flex-end
        }

        .mt-flex-center {
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center
        }

        .mt-flex-right {
            -ms-flex-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end
        }

        .mt-flex-space-between {
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between
        }

        .mt-clearfix:after {
            content: "";
            clear: both;
            display: block;
        }

        .mt-clearfix {
            clear: both;
            padding: 0
        }

        .uk-list li {
            list-style: none;
        }
    </style>

    <div id="fb-root"></div>


</body>

</html>