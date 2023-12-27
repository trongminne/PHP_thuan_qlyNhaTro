<?php
$err = "";
$suss = "";
if (isset($_POST['check']) == true) {
    $email = $_POST['email'];

    // KẾT NỐI CSDL

    $host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
    $dbname = "quanlynhatro"; //tên database sẽ kết nối đến
    $username = "root"; //username để kết nối đến database 
    $password = ""; // mật khẩu để kết nối đến database
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);  // kết nối đến database. $conn gọi là đối tượng kết nối.

    if (!$conn) {
        echo 'Thất bại'; // test
    }

    $sql = "SELECT * FROM taikhoan WHERE email =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $err = "Email này chưa được đăng kí!";
    } else {
        $matkhaumoi = substr(md5(rand(0, 9999)), 0, 8);
        $sql = "UPDATE taikhoan SET matkhau = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matkhaumoi, $email]);
        // echo 'Cập nhật thành công!';
        matkhaumoi($email, $matkhaumoi);
        $suss = "Mật khẩu của bạn đã được khôi phục, hãy kiểm tra mail!";
    }
}
?>
<?php
function matkhaumoi($email, $matkhaumoi)
{
    require "./PHPMailer-master/src/PHPMailer.php";
    require "./PHPMailer-master/src/SMTP.php";
    require './PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug - để xem lỗi
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'aevantho4@gmail.com'; // SMTP username
        $mail->Password = 'gvwzlmtjjjtwswxs';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('aevantho2@gmail.com', 'Trọng Min');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Trọng Min gửi bạn mật khẩu mới';
        $noidungthu = "<p>Bạn hoặc ai đó đã yêu câu khôi phục mật khẩu từ website: Trongmin.online</p>
            mật khẩu mới của bạn là {$matkhaumoi}
        ";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <title>Quên mật khẩu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style_khoiphucpass.css">
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
                    <span class="text-2">Khôi phục mật khẩu</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Quên mật khẩu
                        <?php
                        if (isset($err) && $err != '') {

                            echo '<h2  style="color: red;"> ' . $err . ' </h2>';
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
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Nhập email" name="email" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Gửi yêu cầu" name="check">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>