<?php
require '../include/connect.php';
?>

<?php
if (isset($_POST['signup_btn'])) {
    // Lấy dữ liệu từ form đăng ký
    $taikhoan = $_POST['taikhoan'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $matkhau2 = $_POST['matkhau2'];
    if ($matkhau != $matkhau2) {
        echo "<script>alert('Mật khẩu không khớp');</script>";
    } else {
        // Kiểm tra xem tài khoản đã tồn tại trong cơ sở dữ liệu chưa
        $query = "SELECT * FROM taikhoan WHERE taikhoan='$taikhoan' or email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Tài khoản đã tồn tại');</script>";
        } else {
            // Thêm tài khoản mới vào bảng taikhoan
            $query = "INSERT INTO taikhoan (taikhoan, email, matkhau) VALUES ('$taikhoan', '$email', '$matkhau')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Đăng ký thành công'); window.location.href='dang-nhap-nha-tro-dai-hoc-sao-do.html';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại: " . mysqli_error($conn) . "'); window.location.href='./dangki.php</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <base href="http://localhost:8080/login/">
    <title>Đăng kí</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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


    <div class="container card">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="nhatro.jpg" alt="">
                <div class="text">
                    <span class="text-1">Nhà trọ sinh viên<br>Đại học Sao Đỏ</span>
                    <span class="text-2">Đăng kí</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Đăng kí

                    </div>

                    <form method="POST" action="">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class='fas fa-user'></i>
                                <input type="text" placeholder="Nhập tài khoản" name="taikhoan" required>
                            </div>

                            <div class="input-box">
                                <i class='fas fa-envelope'></i>
                                <input type="text" placeholder="Nhập email" name="email" required>
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Nhập mật khẩu" name="matkhau" required>
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Nhập lại mật khẩu" name="matkhau2" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Đăng kí" name="signup_btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>