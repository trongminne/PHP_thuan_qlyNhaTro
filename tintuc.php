<?php
require './include/security.php';
require './include/connect.php';
require './include/head.php';

// Xuất bảng khu vực
$tintuc = mysqli_query($conn, "SELECT * FROM tintuc");
$khuvuc = mysqli_query($conn, "SELECT * FROM khuvuc");
$nhatro = mysqli_query($conn, "SELECT * FROM nhatro WHERE trangthai = 1");

// ý nghĩa câu truy vấn trên:
// Tạo 1 cột name_cate giữa 2 thuộc tính id_cate của bảng product và id của category


// Bước 1: Tính tổng số bản ghi bảng khu vực

$total = mysqli_num_rows($tintuc);

// Bước 2: Số trang / 1 trang

$limit = 10;

// Bước 3: Tính số trang

$page = ceil($total / $limit);


// Bước 4: Lấy trang hiện tại
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);

// Bước 5: Tính start 

$start = ($cr_page -  1) * $limit;

// Bước 6 query dữ liệu limit

$tintuc = mysqli_query($conn, "SELECT * FROM tintuc LIMIT $start, $limit");
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

                .slider-large .item img {
                    height: auto !important;
                }

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
                            <a href="nha-tro-sinh-vien-dai-hoc-sao-do.html">
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
                            <a class="nav-link dropdown-toggle" href="./login/login.php">
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
                            <li class="devices">
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
                                        <a class="nav-link dropdown-toggle" href="./login/login.php" id="userDropdown" quyen="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                echo '<a class="dropdown-item" href="./login/login.php">
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
        <div id="main" class="wrapper main-product">
            <div class="category-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12 col-edit-1">
                            <div class="relative-category">
                                <div class="top-category">
                                    <h3 class="title-category">DANH MỤC KHU VỰC<i class="fa fa-bars"></i></h3>
                                </div>
                                <div class="nav-category-home hello">
                                    <?php foreach ($khuvuc as $key => $value) : ?>
                                        <ul>
                                            <li>
                                                <a href="<?php echo $value['id_khuvuc'] . '-khu-vuc-' . makeUrl($value['tenkhuvuc']) . '.html' ?>" style="width: calc(100% - 30px);"><?php echo $value['tenkhuvuc']; ?></a>
                                            </li>

                                        </ul>
                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12 col-edit-4">
                            <div id="main-menu1">
                                <ul>
                                    <li>
                                        <a href="nha-tro-sinh-vien-dai-hoc-sao-do.html">
                                            <div class="nav_horizontal_item">
                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">Trang chủ
                                                </div>
                                            </div>
                                        </a>
                                    </li>
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
                                        <a href="#lienhe">
                                            <div class="nav_horizontal_item">
                                                <div class="nav_horizontal_text">
                                                    <p class="newBigText">Liên hệ
                                                </div>
                                            </div>
                                        </a>

                                    </li>
                                    <li>
                                        <a href="">
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
                    margin-bottom: 100px;
                }

                .css-icon-plus.cssssss {
                    display: block;
                }

                /*  .nav-category-home ul li:hover i.css-icon-plus.cssssss:before{
                    content: ;
                    } */
            </style>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".top-category").click(function() {
                        $(".nav-category-home").slideToggle();
                    });
                });
            </script>

            <section class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="sidebar wow fadeInUp">
                                <div class="sidebar wow fadeInUp">
                                    <div class="item-sb side-category">
                                        <div class="category">

                                        </div>

                                    </div>
                                </div>
                                <style type="text/css" media="screen">
                                    .fillter_bl .fa.fa-check {
                                        position: absolute;
                                        left: 12px;
                                        top: 9px;
                                        display: none;
                                        color: green;
                                    }

                                    .fillter-label.tpInputLabel.checked label::before {
                                        border: 1px solid #ccc !important;
                                    }

                                    .fillter-label.tpInputLabel.checked label .fa.fa-check {
                                        display: block;
                                    }
                                </style>

                                <form class="uk-hidden" id="Formfilter" method="post" action="" style="display: none;">
                                    <input type="text" value="" name="attr" id="attr" class="confirm-filter" />
                                    <input type="text" value="1" name="page" id="page" class="" />
                                    <input type="text" value="97" name="cataloguesid" id="cataloguesid" class="" />
                                    <input type="submit" value="" name="submit" id="filter_submit" class="" />
                                </form>
                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        $('#Formfilter').on('submit', function(e) {
                                            var attr = $('#attr').val();
                                            var page = $('#page').val();
                                            var cataloguesid = $('#cataloguesid').val();
                                            var postData = $(this).serializeArray();
                                            var formURL = 'products/ajax/products/filter';
                                            $.post(formURL, {
                                                    post: attr,
                                                    page: page,
                                                    cataloguesid: cataloguesid
                                                },
                                                function(data) {
                                                    var json = JSON.parse(data);
                                                    if (json.html.length) {

                                                        $('#list-filter-ajax').html('').html(json.html);
                                                    } else {
                                                        $('#list-filter-ajax').html(
                                                            'Không có dữ liệu phù hợp');
                                                    }

                                                });
                                            return false;
                                        });


                                        $('.filter').change(function(e) {
                                            var str = '';
                                            $('.filter').each(function() {
                                                if ($(this).val() != 0 && $(this).prop('checked') ==
                                                    true) {
                                                    str = str + $(this).val() + '-';
                                                }
                                            });
                                            if (str.length > 0) {
                                                str = str.substr(0, str.length - 1);
                                                $('#attr').val(str);
                                            } else {
                                                $('#attr').val('');
                                            }
                                            e.stopImmediatePropagation();
                                            $('#filter_submit').click();
                                        });

                                        $('input.filter').click(function() {
                                            var id = $(this).prop('id');
                                            var name = $(this).prop('name');
                                            $('input[name="' + name + '"]:not(#' + id + ')').prop('checked',
                                                false);
                                        });


                                    });
                                    $(function() {
                                        $('.tpInputLabel').on('click', function() {
                                            var line = $(this).attr('data-line');
                                            $('.' + line + '').removeClass('checked');
                                            if ($(this).find('.filter').is(':checked')) {
                                                $(this).addClass('checked');
                                            } else {
                                                $(this).removeClass('checked');
                                            }
                                        });
                                    });
                                    $(function() {
                                        $(document).on('click', '#ajax-pagination li a', function(e) {
                                            var page = $(this).attr('data-ci-pagination-page');
                                            $('#page').val(page);
                                            e.stopImmediatePropagation();
                                            $('#filter_submit').click();
                                            return false;
                                        });
                                    });
                                </script>
                                <style>
                                    .content_fillter {
                                        border: 1px solid #f0f0f0;
                                    }

                                    .attribute-title {
                                        line-height: 34px;
                                        color: #333;
                                        border-bottom: solid 1px #ccc;
                                        text-shadow: 1px 1px 0 #fff;
                                        background: #eee;
                                        font-weight: bold;
                                        padding: 0 10px;
                                        font-family: 'Roboto', sans-serif;
                                        font-size: 16px;
                                    }

                                    .attribute-group {
                                        padding: 5px 0;
                                    }

                                    .attribute-group .fillter-label {
                                        padding-left: 10px;
                                        display: block;
                                        line-height: 30px;
                                        font-size: 13px;
                                        position: relative;
                                        height: 30px;
                                        overflow: hidden;
                                    }

                                    .attribute-group .fillter-label label {
                                        padding-left: 20px;
                                        font-family: 'Roboto', sans-serif;
                                    }

                                    .attribute-group input[type="checkbox"] {
                                        display: none;
                                    }

                                    .fillter-label.tpInputLabel label::before {
                                        height: 16px;
                                        width: 16px;
                                        border: 1px solid #ccc;
                                        border-radius: 2px;
                                        content: '';
                                        display: block;
                                        position: absolute;
                                        left: 10px;
                                        top: 8px;
                                    }

                                    .fillter-label.tpInputLabel.checked label::before {
                                        background: url('public/images/checked.png');
                                        border: 0;
                                    }
                                </style>
                                <style type="text/css" media="screen">
                                    .side-category .title {
                                        background: linear-gradient(#caad5c -16%, #f2e386 47%, #caad5c 82%);
                                        padding: 12px 15px;
                                        font-weight: 600;
                                        margin-bottom: 0px;
                                    }

                                    .side-category .title i {
                                        margin-right: 7px;
                                    }

                                    .side-category ul {
                                        background-color: #040404;
                                        list-style: none;
                                        padding: 0px;
                                        margin: 0px;
                                    }

                                    .side-category ul li {
                                        color: #fff;
                                        padding: 10px 15px;
                                        border-bottom: 1px dashed #333333;
                                    }

                                    .side-category ul li i {
                                        float: right;
                                    }

                                    .side-category ul li a {
                                        color: #fff;
                                        text-transform: uppercase;
                                    }

                                    .side-category ul.sub {
                                        position: absolute;
                                        width: 250px;
                                        z-index: 999;
                                        left: 100%;
                                        top: 0%;
                                        display: none;
                                    }

                                    .side-category ul li:hover>a,
                                    .side-category ul li:hover>i {
                                        color: #b1a662;
                                    }

                                    .side-category ul li:hover>ul {
                                        display: block;
                                    }

                                    @media (max-width: 600px) {
                                        .side-category ul.sub {
                                            display: none !important;
                                        }

                                        .side-category ul li i {
                                            display: none !important;
                                        }
                                    }
                                </style>

                                <div class="sidebar wow fadeInUp tt-magin-1028">

                                    <div class="item-sb">
                                        <h3 class="title-sb">
                                            Nhà trọ
                                        </h3>
                                        <div class="nav-right-new nav-right-new2">
                                            <?php foreach ($nhatro as $key => $value) { ?>

                                                <div class="item magin-tintuc-mini">
                                                    <div class="image">
                                                        <a href="<?php echo $value['id_nhatro'] . '-nha-tro-' . makeUrl($value['name']) . '.html' ?>"><img src="./chutro/public/upload/<?php echo $value['image'] ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="nav-img">
                                                        <h3 class="title"><a href="<?php echo $value['id_nhatro'] . '-nha-tro-' . makeUrl($value['name']) . '.html' ?>"><?php echo $value['name'] ?></a>
                                                        </h3>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                </div>

                                            <?php } ?>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 margin-nhatro">
                            <div class="nav-main-content">
                                <div class="content-product magin-top-show-tro">
                                    <div class="title-primary wow fadeInUp magin-text-nhatro" style="visibility: visible; animation-name: fadeInUp;">
                                        <h1 class="title1">Tin tức</h1>
                                    </div>

                                    <div class="nav-product magin-show-nhatro" id="list-filter-ajax">
                                        <div class="row">
                                            <?php foreach ($tintuc as $key => $value) { ?>

                                                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
                                                    <div class="item-product">
                                                        <div class="image">
                                                            <a href="./tintuc/show_tintuc.php?id=<?php echo $value['id'] ?>" class="thubmail-img"><img src="./chutro/public/upload/<?php echo $value['image'] ?>" alt="">
                                                            </a>
                                                            <a href="./tintuc/show_tintuc.php?id=<?php echo $value['id'] ?>" class="quick-view" data-link-action="quickview">

                                                            </a>
                                                            <div class="new-pr-1"><img src="./admin/tintuc/upload/new.png" alt="">
                                                            </div>
                                                            <!-- Ảnh new -->

                                                        </div>

                                                        <h3 class="title magin-top-tieude" style="margin-left: 55px;"><a href="./tintuc/show_tintuc.php?id=<?php echo $value['id'] ?>">
                                                                <?php echo $value['tieude'] ?></a></h3>

                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <!-- phân trang -->
                                        <?php if ($total > 10) { ?>

                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">


                                                    <?php if ($cr_page - 1 > 0) { ?>
                                                        <li class="page-item"><a class="page-link" href="./tintuc.php?page=<?php echo $cr_page - 1 ?>">Trước</a>
                                                        </li>
                                                    <?php } ?>


                                                    <?php for ($i = 1; $i <= $page; $i++) {
                                                        if ($i > $cr_page - 3 && $i < $cr_page + 3) { ?>
                                                            <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                                                                <a class="page-link" href="./tintuc.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($cr_page < $page) { ?>
                                                        <li class="page-item"><a class="page-link" href="./tintuc.php?page=<?php echo $cr_page + 1 ?>">Sau</a></li>
                                                    <?php } ?>

                                                </ul>
                                            </nav>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
                <li><a href="https://www.facebook.com/TruongDHSaoDo/"><i class="fab fa-facebook-f"></i></a>
                </li>

                <li><a href="https://www.instagram.com/explore/locations/470772854/truong-ai-hoc-sao-o/"><i class="fab fa-instagram"></i></a>
                </li>

                <li><a href="https://saodo.edu.vn/"><i class="fab fa-google"></i></a>
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
        <div id="show_success_mss" style="position: fixed; top: 150px; right: 20px;z-index: 99999">
            <!--  -->
        </div>
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
        <div id="modal-cart" class="modal fade" tabindex="-1" role="dialog">
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
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src =
                'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=456763814831300&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>