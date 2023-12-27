<?php
// Chuyển đổi cách việt dấu-cách sang thường -

function makeUrl($string)
{
    $string = trim($string);
    $string = str_replace(' ', '-', $string);
    $string = str_replace('&', '-', $string);
    $string = strtolower($string);
    $string = preg_replace('/(à|á|ả|ã|ạ|ă|ằ|ắ|ẳ|ẵ|ặ|â|ầ|ấ|ẩ|ẫ|ậ)/', 'a', $string);
    $string = preg_replace('/(A|À|Á|Ả|Ã|Ạ|Ă|Ằ|Ắ|Ẳ|Ẵ|Ặ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ)/', 'a', $string);
    $string = preg_replace('/(è|é|ẻ|ẽ|ẹ|ê|ề|ế|ể|ễ|ệ)/', 'e', $string);
    $string = preg_replace('/(E|È|É|Ẻ|Ẽ|Ẹ|Ê|Ề|Ế|Ể|Ễ|Ệ)/', 'e', $string);
    $string = preg_replace('/(ì|í|ỉ|ĩ|ị)/', 'i', $string);
    $string = preg_replace('/(I|Í|Í|Ỉ|Ĩ|Ị)/', 'i', $string);
    $string = preg_replace('/(ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ỡ|ở|ợ)/', 'o', $string);
    $string = preg_replace('/(O|Ò|Ó|Ỏ|Õ|Ọ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ|Ơ|Ờ|Ớ|Ỡ|Ở|Ợ)/', 'o', $string);
    $string = preg_replace('/(ù|ú|ủ|ũ|ụ|ư|ừ|ứ|ử|ữ|ự)/', 'u', $string);
    $string = preg_replace('/(U|Ù|Ú|Ủ|Ũ|Ụ|Ư|Ừ|Ứ|Ử|Ữ|Ự)/', 'u', $string);
    $string = preg_replace('/(ỳ|ý|ỷ|ỹ|ỵ)/', 'y', $string);
    $string = preg_replace('/(Y|Ỳ|Ý|Ỷ|Ỹ|Ỵ)/', 'y', $string);
    $string = preg_replace('/(đ|Đ)/', 'd', $string);

    return $string;
}

?>


<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta http-equiv="refresh" content="1800" />
    <meta name="twitter:image" content="./public/images/icon_title.png" />
    <link rel="icon" href="./public/images/icon_title.png" type="image/png" sizes="30x30">
    <link rel="stylesheet" type="text/css" href="public/css/fonts/font.css">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="public/css/animate.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 

    <!-- link mobile  -->
    <link rel="stylesheet" href="public/css/demo.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/responsive.css">
    <script type="text/javascript" src="public/js/jquery.min.js"></script>
    <meta name="p:domain_verify" content="030e9cac5d986311fb7cb4d678d5afa5" />
    <meta name="google-site-verification" content="5AjKoXJjYM4IypeLfcPVSSkGObQ9mCcsYb9_ZaenHkw" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HW1RN4KJZC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HW1RN4KJZC');
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 667520727 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-667520727"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-667520727');
    </script>
    <script type="text/javascript">
        var BASE_URL = '';
    </script>

</head>

<div class="loader" id="preloader">
    <div class="loader-content">
        <img src="./public/images/icon_title.png" alt="Avatar" class="img_load">
        <div class="box-1"></div>
        <span>Loading...</span>
    </div>
</div>


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
<script>
    document.getElementById('searchForm').addEventListener('submit', function(
        event) {
        event.preventDefault(); // chặn sự kiện submit mặc định của form

        var keyword = document.querySelector('.keyword')
            .value; // lấy giá trị từ ô input keyword
        var url = 'tim-kiem-nha-tro-' + keyword.replace(/\s+/g, '-') +
            '.html'; // tạo URL với từ khóa tìm kiếm

        window.location.href = url; // chuyển hướng đến URL mới
    });
</script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="./public/js/loading.js"></script>

