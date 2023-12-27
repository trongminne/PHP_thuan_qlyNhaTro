<head>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

</head>



<body>
    <?php

    include '../include/connect.php';
    session_start();
    $id_account = $_SESSION['id'];

    if (isset($_GET['vnp_Amount']) & isset($_SESSION['email'])) {
        $trangthai = $_GET['vnp_ResponseCode'];
        $ngay_gd = $_GET['vnp_PayDate'];
        $coin = $_GET['vnp_Amount'] / 100;

        if ($_GET['vnp_ResponseCode'] == '00') {
            $email = $_SESSION['email'];
            $thanhcong = mysqli_query($conn, "INSERT INTO lichsu_nap(id_taikhoan, sotien, trangthai) VALUES ('$id_account', '$coin', '$trangthai')");

            $sql = "UPDATE taikhoan SET coin = coin + $coin WHERE email = '$email'";
            $qr = mysqli_query($conn, $sql);

            if ($qr & $thanhcong) {
                // Hiển thị thông báo chèn thành công
                echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Nạp tiền thành công!",


                            }).then(function() {
                                window.location.href = "../login/logout.php?logout";
                            });
                            </script>';
            } else {
                // Hiển thị thông báo chèn không thành công
                echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Nạp tiền thất bại!",


                            }).then(function() {
                                window.location.href = "../index.php";
                            });
                            </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Nạp tiền thất bại!",


                    }).then(function() {
                        window.location.href = "../index.php";
                    });
                    </script>';
        }
    }

    ?>
</body>
<!-- 
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
<!-- <link href="assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="assets/jquery-1.11.3.min.js"></script>
</head>

<body>  -->
<?php
// require_once("./config.php");
// $vnp_SecureHash = $_GET['vnp_SecureHash'];
// $inputData = array();
// foreach ($_GET as $key => $value) {
//     if (substr($key, 0, 4) == "vnp_") {
//         $inputData[$key] = $value;
//     }
// }

// unset($inputData['vnp_SecureHash']);
// ksort($inputData);
// $i = 0;
// $hashData = "";
// foreach ($inputData as $key => $value) {
//     if ($i == 1) {
//         $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
//     } else {
//         $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
//         $i = 1;
//     }
// }

// $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>
<!--Begin display -->
<!--<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">VNPAY RESPONSE</h3>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label>Mã đơn hàng:</label>

            <label><?php //echo $_GET['vnp_TxnRef'] 
                    ?></label>
        </div>
        <div class="form-group">

            <label>Số tiền:</label>
            <label><?php //echo $_GET['vnp_Amount'] / 100 . ' vnđ'; 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Nội dung thanh toán:</label>
            <label><?php //echo $_GET['vnp_OrderInfo'] 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Mã phản hồi (vnp_ResponseCode):</label>
            <label><?php //echo $_GET['vnp_ResponseCode'] 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Mã GD Tại VNPAY:</label>
            <label><?php //echo $_GET['vnp_TransactionNo'] 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Mã Ngân hàng:</label>
            <label><?php //echo $_GET['vnp_BankCode'] 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Thời gian thanh toán:</label>
            <label><?php //echo $_GET['vnp_PayDate'] 
                    ?></label>
        </div>
        <div class="form-group">
            <label>Kết quả:</label>
            <label>
                <?php
                // if ($secureHash == $vnp_SecureHash) {
                //     if ($_GET['vnp_ResponseCode'] == '00') {
                //         echo "<span style='color:blue'>GD Thanh cong</span>";
                //     } else {
                //         echo "<span style='color:red'>GD Khong thanh cong</span>";
                //     }
                // } else {
                //     echo "<span style='color:red'>Chu ky khong hop le</span>";
                // }
                ?>

            </label>
        </div>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; VNPAY <?php //echo date('Y') 
                        ?></p>
    </footer>
</div>
</body>

</html>