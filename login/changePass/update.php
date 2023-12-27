<?php
if (session_id() == '') session_start();
if (isset($_SESSION['taikhoan']) == false) {
    header("location: ../login.php");
    exit();
}

$tk = $_SESSION['taikhoan'];
// print_r($_POST);

$loi = "";
$suss = "";
if (isset($_POST['update']) == true) {
    $matkhaucu = $_POST['matkhaucu'];
    $matkhaumoi_1 = $_POST['matkhaumoi_1'];
    $matkhaumoi_2 = $_POST['matkhaumoi_2'];
    // Cách kết nối 1
    // $conn = new PDO("mysql:host=localhost;dbname=quanlynhatro;charset=utf8", "root", "");
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cách 2 kết nối
    $host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
    $dbname = "quanlynhatro"; //tên database sẽ kết nối đến
    $username = "root"; //username để kết nối đến database 
    $password = ""; // mật khẩu để kết nối đến database
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);  // kết nối đến database. $conn gọi là đối tượng kết nối.

    if (!$conn) {
        echo 'Thất bại'; // test
    }
    // $sql = "SELECT `taikhoan`, `matkhau`, `hoten`, `quyen` FROM `taikhoan` WHERE 1";
    // $kq = $conn->query(z$sql);
    // $row = $kq->fetch();
    // print_r($row);

    // test và hiển thị csdl
    $sql = "SELECT * FROM taikhoan WHERE taikhoan = ? AND matkhau = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tk, $matkhaucu]);
    if ($stmt->rowCount() == 0) {
        $loi .= "Mật khẩu cũ sai!<br>";
    }
    if (strlen($matkhaumoi_1) < 6) {
        $loi .= "Mật khẩu mới phải từ 6 kí tự trở lên!<br>";
    }
    if ($matkhaumoi_1 != $matkhaumoi_2) {
        $loi .= "Mật khẩu 2 lần không giống nhau!<br>";
    }

    if ($loi == "") {
        $sql = "UPDATE taikhoan SET matkhau = ? WHERE taikhoan = ?";
        $stmt = $conn->prepare($sql); //prepare stement
        $stmt->execute([$matkhaumoi_1, $tk]);
        $suss = "Bạn đã đổi thành công mật khẩu!";
    }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <title>Đổi mật khẩu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style_update.css">
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
    <div class="container card">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="../nhatro.jpg" alt="">
                <div class="text">
                    <span class="text-1">Nhà trọ sinh viên<br>Đại học Sao Đỏ</span>
                    <span class="text-2">Đổi mật khẩu</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Đổi mật khẩu
                        <?php
                        if (isset($loi) && $loi != '') {
                            echo '<h2  style="color: red;"> ' . $loi . ' </h2>';
                            //unset($_SESSION['status']);
                        }
                        ?>

                        <?php
                        if (isset($suss) && $suss != '') {
                            echo '<h2 class="bg-danger text-white"> ' . $suss . ' </h2>';
                            //unset($_SESSION['status']);
                        }
                        ?>
                    </div>

                    <form method="POST" action="">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class='fas fa-user'></i>
                                <input type="text" value="<?php echo $tk ?>" placeholder="Nhập tài khoản" name="taikhoan" disabled>
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" value="<?php if (isset($matkhaucu) == true) echo $matkhaucu; ?>" placeholder="Nhập mật khẩu cũ" name="matkhaucu" required>
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" value="<?php if (isset($matkhaumoi_1) == true) echo $matkhaumoi_1; ?>" placeholder="Nhập mật khẩu mới" name="matkhaumoi_1" required>
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" value="<?php if (isset($matkhaumoi_2) == true) echo $matkhaumoi_2; ?>" placeholder="Nhập lại mật khẩu mới" name="matkhaumoi_2" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Đổi mật khẩu" name="update" onclick="return confirm('Bạn chắc chắn muốn đổi mật khẩu')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>