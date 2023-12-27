<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <title>Đăng nhập</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <base href="http://localhost:8080/login/">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">


</head>


<body>
    <?php

    include "../include/connect.php";

    if (isset($_POST['login_btn'])) {

        $taikhoan = mysqli_real_escape_string($conn, $_POST['taikhoan']);
        $matkhau = mysqli_real_escape_string($conn, $_POST['matkhau']);

        $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$taikhoan' LIMIT 1";
        $qr = mysqli_query($conn, $sql);

        if (mysqli_num_rows($qr) == 1) {

            $user = mysqli_fetch_assoc($qr);

            // Nếu mật khẩu chưa được mã hóa thì so sánh trực tiếp với mật khẩu trong cơ sở dữ liệu
            if ($matkhau == $user['matkhau']) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['email'] = $user['email'];
                $_SESSION['coin'] = $user['coin'];
                $_SESSION['taikhoan'] = $user['taikhoan'];
                $_SESSION['quyen'] = $user['quyen'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['coin'] = $user['coin'];
                echo "<script>alert('Đăng nhập thành công'); window.location.href='../index.php';</script>";
            }
        } else {
            echo '<script>
            alert("lỗi")
            </script>';
        }
    }
    ?>

    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>


    <div class="container card">
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