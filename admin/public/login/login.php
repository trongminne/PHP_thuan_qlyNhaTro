<?php
require 'connect.php';


if (isset($_POST['login_btn'])) {
    $tk = $_POST['taikhoan'];
    $mk = $_POST['matkhau'];

    $sql = "SELECT * FROM taikhoan WHERE (taikhoan = '$tk') AND (matkhau = '$mk') LIMIT 1";
    $qr = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($qr);
    if ($rowcount) {
        if (!isset($_SESSION)) {
            @ob_start();
            session_start();
        }
        $_SESSION['taikhoan'] = $tk;
        header('Location: ../index.php');
    } else {
        $status =  "Tài khoản hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>


    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="nhatro.jpg" alt="">
                <div class="text">
                    <span class="text-1">Nhà trọ sinh viên<br>Đại học Sao Đỏ</span>
                    <span class="text-2">Đăng nhập</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Đăng nhập
                        <?php
                        if (isset($status) && $status != '') {
                            echo '<h2 style="color: red;"> ' . $status . ' </h2>';
                            //unset($_SESSION['status']);
                        }
                        ?>
                    </div>


                    <form method="POST" action="">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class='fas fa-user'></i>
                                <input type="text" placeholder="Nhập tài khoản" name="taikhoan" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Nhập mật khẩu" name="matkhau" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Đăng nhập" name="login_btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>