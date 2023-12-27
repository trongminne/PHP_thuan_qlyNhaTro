<?php
include '../admin/include/connect.php';
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $nhatro = mysqli_query($conn, "SELECT *, (SELECT COUNT(*) FROM lichsu_dat WHERE id_nhatro = $id) AS soluong_dondat FROM nhatro WHERE id_nhatro = $id");
    $data1 = mysqli_fetch_assoc($nhatro);


    $binhluan = mysqli_query($conn, "SELECT taikhoan, thoigian, noidung, img1, img2, video  FROM danhgia INNER JOIN taikhoan ON danhgia.id_taikhoan = taikhoan.id WHERE id_nhatro = $id");

    // nếu đăng nhập thì hiện điểm đã đánh giá
    if (isset($_SESSION['id'])) {
        $id_taikhoan = $_SESSION['id'];
        $danhgia_acc = mysqli_query($conn, "SELECT diem FROM danhgia WHERE id_nhatro = $id and id_taikhoan = '$id_taikhoan'");
        $row = mysqli_fetch_assoc($danhgia_acc); // Lấy dòng dữ liệu từ kết quả truy vấn
        if ($row != null) {
            $diem = $row['diem'];
        }
    } else {

        // Truy vấn để tính trung bình điểm đánh giá
        $query = "SELECT AVG(diem) AS average_diem, COUNT(*) AS total_reviews FROM danhgia WHERE id_nhatro = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row != null) {
            $diem_chualt = $row['average_diem'];
            $diem = ceil($row['average_diem']);
            $dem = $row['total_reviews'];
        } else {
            $diem = 0;
            $dem = 0;
        }
    }
}
?>

<?php

// Show ảnh 1
$img1 = mysqli_query($conn, "SELECT name_img FROM img_nhatro WHERE id_nhatro = '$id' LIMIT 0,1");
$img1_row = mysqli_fetch_assoc($img1);

// Show ảnh 2
$img2 = mysqli_query($conn, "SELECT name_img FROM img_nhatro WHERE id_nhatro = '$id' LIMIT 1,1");
$img2_row = mysqli_fetch_assoc($img2);

// Show ảnh 3
$img3 = mysqli_query($conn, "SELECT name_img FROM img_nhatro WHERE id_nhatro = '$id' LIMIT 2,1");
$img3_row = mysqli_fetch_assoc($img3);

// Show ảnh 4
$img4 = mysqli_query($conn, "SELECT name_img FROM img_nhatro WHERE id_nhatro = '$id' LIMIT 3,1");
$img4_row = mysqli_fetch_assoc($img4);

?>
<!-- Xử lý bình luận -->
<?php
// Kết nối đến cơ sở dữ liệu ở đây

if (isset($_POST['btn_binhluan'])) {
    // Lấy dữ liệu từ biểu mẫu
    $id_taikhoan = $_SESSION['id'];
    $id_nhatro = $_POST['id_nhatro'];
    $diem = $_POST['diem'];
    $thoigian = date('Y-m-d H:i:s');
    $noidung = $_POST['binhluan'];

    // Lấy dữ liệu bình luận trước đó để xoá
    $selectQuery = "SELECT img1, img2, video FROM danhgia WHERE id_nhatro = $id_nhatro AND id_taikhoan = '$id_taikhoan'";
    $previousData = mysqli_query($conn, $selectQuery);

    if ($previousData && mysqli_num_rows($previousData) > 0) {
        $row = mysqli_fetch_assoc($previousData);
        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $video = $row['video'];

        // Xoá bình luận và các file đính kèm của bình luận trước (nếu có)
        $deleteQuery = "DELETE FROM danhgia WHERE id_nhatro = $id_nhatro AND id_taikhoan = '$id_taikhoan'";
        mysqli_query($conn, $deleteQuery);

        // Xoá file ảnh 1 (nếu có)
        if (!empty($img1)) {
            deleteFile($img1);
        }

        // Xoá file ảnh 2 (nếu có)
        if (!empty($img2)) {
            deleteFile($img2);
        }

        // Xoá file video (nếu có)
        if (!empty($video)) {
            deleteFile($video);
        }
    }

    // Escape các giá trị để tránh SQL injection
    $noidung = $_POST['binhluan'];

    // Xử lý tải lên ảnh 1
    $img1 = "";
    if (isset($_FILES['ImageUpload1']) && $_FILES['ImageUpload1']['error'] == UPLOAD_ERR_OK) {
        $img1 = saveUploadedFile($_FILES['ImageUpload1']);
    }

    // Xử lý tải lên ảnh 2
    $img2 = "";
    if (isset($_FILES['ImageUpload2']) && $_FILES['ImageUpload2']['error'] == UPLOAD_ERR_OK) {
        $img2 = saveUploadedFile($_FILES['ImageUpload2']);
    }

    // Xử lý tải lên video
    $video = "";
    if (isset($_FILES['VideoFile']) && $_FILES['VideoFile']['error'] == UPLOAD_ERR_OK) {
        $video = saveUploadedFile($_FILES['VideoFile']);
    }

    // Thực hiện truy vấn để chèn dữ liệu vào bảng danhgia
    $query = "INSERT INTO danhgia (id_taikhoan, id_nhatro, diem, noidung, img1, img2, video, thoigian)
              VALUES ('$id_taikhoan', '$id_nhatro', '$diem', '$noidung', '$img1', '$img2', '$video', '$thoigian')";

    // Thực thi truy vấn
    mysqli_query($conn, $query);

    // Điều hướng người dùng về trang khác sau khi thêm bình luận thành công

    header("Location: ../index.php");
    exit();
}

// Hàm để lưu tệp tải lên và trả về đường dẫn tới tệp
function saveUploadedFile($file)
{
    $targetDirectory = "uploads/"; // Thay đổi đường dẫn tới thư mục lưu trữ ảnh tải lên
    $targetFile = $targetDirectory . basename($file['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra nếu tệp đã tồn tại
    if (file_exists($targetFile)) {
        // Xử lý tên tệp trùng lặp nếu cần thiết
        $targetFile = $targetDirectory . generateUniqueFileName($file['name']);
    }

    // Di chuyển tệp đã tải lên vào thư mục đích
    move_uploaded_file($file["tmp_name"], $targetFile);

    return $targetFile;
}

// Hàm để tạo tên tệp duy nhất nếu có tên trùng lặp
function generateUniqueFileName($filename)
{
    $nameParts = pathinfo($filename);
    $extension = $nameParts['extension'];
    $basename = $nameParts['filename'];

    $index = 1;
    while (file_exists("uploads/$basename-$index.$extension")) {
        $index++;
    }

    return "$basename-$index.$extension";
}

// Hàm để xoá tệp tin
function deleteFile($filePath)
{
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}
?>

<!-- Xử lý đặt phòng -->
<?php
if (isset($_POST['btn_datphong'])) {
    if (isset($_SESSION['id'])) {
        $id_taikhoan = $_SESSION['id'];
        $id_nhatro = $data1['id_nhatro'];

        // Kiểm tra xem tài khoản đã đặt phòng ở nhà trọ này hay chưa
        $check_query = "SELECT * FROM lichsu_dat WHERE id_nhatro = '$id_nhatro' AND id_taikhoan = '$id_taikhoan'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            // Tài khoản đã đặt phòng ở nhà trọ này
            echo "<script>alert('Bạn đã đặt phòng ở nhà trọ này rồi');</script>";
        } else {
            // Lấy giá trị tiền cọc và tài khoản của người đặt phòng
            $query_nguoidat = "SELECT coin FROM taikhoan WHERE id = '$id_taikhoan'";
            $result_nguoidat = mysqli_query($conn, $query_nguoidat);
            $row_nguoidat = mysqli_fetch_assoc($result_nguoidat);
            $tien_coc_nguoidat = $row_nguoidat['coin'];

            // Kiểm tra nếu tài khoản không đủ tiền cọc
            if ($tien_coc_nguoidat < $data1['tiencoc']) {
                echo "<script>alert('Tài khoản của bạn không đủ để đặt cọc. Quay về trang chủ nạp tiền!');  window.location.href = '../index.php';</script>";

                exit(); // Dừng thực hiện các câu lệnh tiếp theo
            }

            // Tài khoản chưa đặt phòng ở nhà trọ này, tiếp tục xử lý đặt phòng
            $madon = 'madon-' . time();
            $qr_dat = mysqli_query($conn, "INSERT INTO lichsu_dat (id_nhatro, id_taikhoan, ma_don, trangthai) VALUES ('$id_nhatro','$id_taikhoan','$madon', '1')");

            // Lấy giá trị tiền cọc và tài khoản của người đặt phòng
            $query_nguoidat = "SELECT coin FROM taikhoan WHERE id = '$id_taikhoan'";
            $result_nguoidat = mysqli_query($conn, $query_nguoidat);
            $row_nguoidat = mysqli_fetch_assoc($result_nguoidat);
            $tien_coc_nguoidat = $row_nguoidat['coin'];

            // Lấy giá trị tiền cọc và tài khoản của chủ trọ
            $query_chutro = "SELECT coin FROM taikhoan WHERE id = (SELECT id_taikhoan FROM nhatro WHERE id_nhatro = '$id_nhatro')";
            $result_chutro = mysqli_query($conn, $query_chutro);
            $row_chutro = mysqli_fetch_assoc($result_chutro);
            $tien_coc_chutro = $row_chutro['coin'];

            // Giảm tiền cọc từ tài khoản người đặt phòng
            $tien_coc_nguoidat -= $data1['tiencoc'];
            $update_nguoidat_query = "UPDATE taikhoan SET coin = '$tien_coc_nguoidat' WHERE id = '$id_taikhoan'";
            mysqli_query($conn, $update_nguoidat_query);

            // Cộng tiền cọc vào tài khoản chủ trọ
            $tien_coc_chutro += $data1['tiencoc'];
            $update_chutro_query = "UPDATE taikhoan SET coin = '$tien_coc_chutro' WHERE id = (SELECT id_taikhoan FROM nhatro WHERE id_nhatro = '$id_nhatro')";
            mysqli_query($conn, $update_chutro_query);

            // Lấy ra email của nhà trọ
            $query = "SELECT tk.email, nt.soluong
                      FROM nhatro nt
                      INNER JOIN taikhoan tk ON nt.id_taikhoan = tk.id
                      WHERE nt.id_nhatro = $id_nhatro";

            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            $soluong = $row['soluong'];

            // Giảm đi 1 trong soluong của nhà trọ
            $soluong_giam = $soluong - 1;
            $update_query = "UPDATE nhatro SET soluong = $soluong_giam WHERE id_nhatro = $id_nhatro";
            mysqli_query($conn, $update_query);

            guiemail($email);
            echo "<script>alert('Đặt phòng thành công. Hệ thống đã báo về email chủ trọ, họ sẽ liên hệ ngay với bạn'); window.location.href = '../index.php';</script>";
        }
    } else {
        header("location: ../login/login.php");
    }
}

?>
<!-- Gửi email thông báo chủ trọ -->
<?php
function guiemail($email)
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
        $mail->Subject = 'Website nhà trọ gửi tin';
        $noidungthu = "<a>Nhà trọ bạn có người đặt</a>";
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
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo 'Nhà trọ ' . $data1['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <base href="http://localhost:8080/product/">

    <!-- <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css" type="text/css"> -->
    <!-- Font awesome -->
    <link rel="stylesheet" href="./vendor/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./assets/css/product-detail.css" type="text/css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
        alert('Nếu bạn đặt phòng bạn sẽ bị trừ số tiền cọc, tránh việc spam làm phiền chủ trọ!')
    </script>

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/curcor.css">

</head>


<body>
    <div class="loader" id="preloader"></div>
    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <main role="main">
        <div class="container mt-4 cursor_icon">


            <div class="card">

                <div class="container-fliud">

                    <div class="wrapper row">

                        <div class="preview col-md-6">

                            <!-- Causorl -->

                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">



                                    <!-- Ảnh dưới để chọn -->

                                    <ol class="carousel-indicators">

                                        <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(../chutro/public/upload/<?php echo $img1_row['name_img']; ?>);">

                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(../chutro/public/upload/<?php echo $img2_row['name_img']; ?>);">
                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(../chutro/public/upload/<?php echo $img3_row['name_img']; ?>);">
                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(../chutro/public/upload/<?php echo $img4_row['name_img']; ?>);">
                                        </li>
                                    </ol>


                                    <!-- Ảnh trên -->

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a class="gallery_img" href="../chutro/public/upload/<?php echo $img1_row['name_img']; ?>">

                                                <img class="d-block w-100" src="../chutro/public/upload/<?php echo $img1_row['name_img'];
                                                                                                        ?>" alt="First slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="../chutro/public/upload/<?php echo $img2_row['name_img']; ?>">
                                                <img class="d-block w-100" src="../chutro/public/upload/<?php echo $img2_row['name_img']; ?>" alt="Second slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="../chutro/public/upload/<?php echo $img3_row['name_img']; ?>">
                                                <img class="d-block w-100" src="../chutro/public/upload/<?php echo $img3_row['name_img'];
                                                                                                        ?>" alt="Third slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="../chutro/public/upload/<?php echo $img4_row['name_img']; ?>">
                                                <img class="d-block w-100" src="../chutro/public/upload/<?php echo $img4_row['name_img'];
                                                                                                        ?>" alt="Fourth slide">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End carousel -->
                        </div>

                        <div class="details col-md-6">
                            <h3 class="product-title">Chủ trọ: <?php echo $data1['name']; ?></h3>

                            <div class="rating">
                                <input value="5" name="diem" id="star-1" type="radio" <?php if (isset($diem) && $diem == '5') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                <label for="star-1">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                                    </svg>
                                </label>
                                <input value="4" name="diem" id="star-2" type="radio" <?php if (isset($diem) && $diem == '4') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                <label for="star-2">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                                    </svg>
                                </label>
                                <input value="3" name="diem" id="star-3" type="radio" <?php if (isset($diem) && $diem == '3') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                <label for="star-3">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                                    </svg>
                                </label>
                                <input value="2" name="diem" id="star-4" type="radio" <?php if (isset($diem) && $diem == '2') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                <label for="star-4">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                                    </svg>
                                </label>
                                <input value="1" name="diem" id="star-5" type="radio" <?php if (isset($diem) && $diem == '1') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                <label for="star-5">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                                    </svg>
                                </label>
                            </div>

                            <p class="product-description" style="margin-top: 70px;"><b>
                                    <?php if (!isset($_SESSION['id'])) {
                                        echo 'Số lượt đánh giá: ' . $dem;
                                    } ?>
                            </p>

                            <p class=""><b>Địa chỉ:
                                </b><?php echo ' ' . $data1['diachi'] . '.'; ?></p>
                            <p class=""><b>Loại phòng:
                                </b><?php
                                    if ($data1['loai'] == '1') {
                                        echo 'Khép kín';
                                    } else {
                                        echo 'Không kín';
                                    }
                                    ?></p>
                            <p class=""><b>Số điện thoại:
                                </b><?php echo ' ' . $data1['sdt'] ?></p>
                            <p class=""><b>Phòng trống:
                                </b><?php echo ' ' . $data1['soluong'] . ' phòng'; ?></p>
                            <p class=""><b>Đã thuê:
                                </b><?php echo $data1['soluong_dondat']  ?></p>

                            <h4 class="price">Tiền cọc:
                                <span>
                                    <?php echo number_format($data1['tiencoc'], 0, ',', '.'); ?>
                                    vnđ
                                </span>
                            </h4>
                            <h4 class="price">Giá:
                                <span>
                                    <?php echo number_format($data1['price'], 0, ',', '.'); ?>
                                    vnđ

                                </span>
                            </h4>
                            <form action="" method="post">
                                <button type="submit" name="btn_datphong">
                                    <svg height="36px" width="36px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                                        <rect fill="#fdd835" y="0" x="0" height="36" width="36"></rect>
                                        <path d="M38.67,42H11.52C11.27,40.62,11,38.57,11,36c0-5,0-11,0-11s1.44-7.39,3.22-9.59 c1.67-2.06,2.76-3.48,6.78-4.41c3-0.7,7.13-0.23,9,1c2.15,1.42,3.37,6.67,3.81,11.29c1.49-0.3,5.21,0.2,5.5,1.28 C40.89,30.29,39.48,38.31,38.67,42z" fill="#e53935"></path>
                                        <path d="M39.02,42H11.99c-0.22-2.67-0.48-7.05-0.49-12.72c0.83,4.18,1.63,9.59,6.98,9.79 c3.48,0.12,8.27,0.55,9.83-2.45c1.57-3,3.72-8.95,3.51-15.62c-0.19-5.84-1.75-8.2-2.13-8.7c0.59,0.66,3.74,4.49,4.01,11.7 c0.03,0.83,0.06,1.72,0.08,2.66c4.21-0.15,5.93,1.5,6.07,2.35C40.68,33.85,39.8,38.9,39.02,42z" fill="#b71c1c"></path>
                                        <path d="M35,27.17c0,3.67-0.28,11.2-0.42,14.83h-2C32.72,38.42,33,30.83,33,27.17 c0-5.54-1.46-12.65-3.55-14.02c-1.65-1.08-5.49-1.48-8.23-0.85c-3.62,0.83-4.57,1.99-6.14,3.92L15,16.32 c-1.31,1.6-2.59,6.92-3,8.96v10.8c0,2.58,0.28,4.61,0.54,5.92H10.5c-0.25-1.41-0.5-3.42-0.5-5.92l0.02-11.09 c0.15-0.77,1.55-7.63,3.43-9.94l0.08-0.09c1.65-2.03,2.96-3.63,7.25-4.61c3.28-0.76,7.67-0.25,9.77,1.13 C33.79,13.6,35,22.23,35,27.17z" fill="#212121"></path>
                                        <path d="M17.165,17.283c5.217-0.055,9.391,0.283,9,6.011c-0.391,5.728-8.478,5.533-9.391,5.337 c-0.913-0.196-7.826-0.043-7.696-5.337C9.209,18,13.645,17.32,17.165,17.283z" fill="#01579b"></path>
                                        <path d="M40.739,37.38c-0.28,1.99-0.69,3.53-1.22,4.62h-2.43c0.25-0.19,1.13-1.11,1.67-4.9 c0.57-4-0.23-11.79-0.93-12.78c-0.4-0.4-2.63-0.8-4.37-0.89l0.1-1.99c1.04,0.05,4.53,0.31,5.71,1.49 C40.689,24.36,41.289,33.53,40.739,37.38z" fill="#212121"></path>
                                        <path d="M10.154,20.201c0.261,2.059-0.196,3.351,2.543,3.546s8.076,1.022,9.402-0.554 c1.326-1.576,1.75-4.365-0.891-5.267C19.336,17.287,12.959,16.251,10.154,20.201z" fill="#81d4fa"></path>
                                        <path d="M17.615,29.677c-0.502,0-0.873-0.03-1.052-0.069c-0.086-0.019-0.236-0.035-0.434-0.06 c-5.344-0.679-8.053-2.784-8.052-6.255c0.001-2.698,1.17-7.238,8.986-7.32l0.181-0.002c3.444-0.038,6.414-0.068,8.272,1.818 c1.173,1.191,1.712,3,1.647,5.53c-0.044,1.688-0.785,3.147-2.144,4.217C22.785,29.296,19.388,29.677,17.615,29.677z M17.086,17.973 c-7.006,0.074-7.008,4.023-7.008,5.321c-0.001,3.109,3.598,3.926,6.305,4.27c0.273,0.035,0.48,0.063,0.601,0.089 c0.563,0.101,4.68,0.035,6.855-1.732c0.865-0.702,1.299-1.57,1.326-2.653c0.051-1.958-0.301-3.291-1.073-4.075 c-1.262-1.281-3.834-1.255-6.825-1.222L17.086,17.973z" fill="#212121"></path>
                                        <path d="M15.078,19.043c1.957-0.326,5.122-0.529,4.435,1.304c-0.489,1.304-7.185,2.185-7.185,0.652 C12.328,19.467,15.078,19.043,15.078,19.043z" fill="#e1f5fe"></path>
                                    </svg>
                                    <span class="now">Ngay!</span>
                                    <span class="play">Đặt</span>
                                </button>
                            </form>
                            <br>


                            <h4 style="margin-left: 10px;">GPS định vị nhà trọ</h4>
                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <div class="map-footer"><?php echo $data1['link_map'] ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về nhà trọ</h3>
                    <div class="row">
                        <div class="col">
                            <?php echo $data1['dess'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6 col-12 pb-4 custom-scrollbar" style=" max-height: 700px;
                overflow: auto; ">
                        <h3>
                            Bình luận
                        </h3>
                        <?php foreach ($binhluan as $key => $value) { ?>
                            <div class="comment mt-4 text-justify float-left" style="padding-bottom: 10px">

                                <h4><?php echo $value['taikhoan'] ?></h4>
                                <span><?php echo $value['thoigian'] ?></span>
                                <p>
                                    <?php echo $value['noidung'] ?>
                                </p>
                                <?php if (!empty($value['img1'])) : ?>
                                    <img src="<?php echo $value['img1'] ?>" width="100" height="100" style="border-radius: 3px" />
                                <?php endif; ?>

                                <?php if (!empty($value['video'])) : ?>
                                    <video width="130" height="70" controls style="border-radius: 3px; margin: 0 10px -27px 10px">
                                        <source src="<?php echo $value['video'] ?>">
                                    </video>
                                <?php endif; ?>

                                <?php if (!empty($value['img2'])) : ?>
                                    <img src="<?php echo $value['img2'] ?>" width="100" height="100" style="border-radius: 3px; " />
                                <?php endif; ?>


                            </div>
                        <?php } ?>
                    </div>


                    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4 form_comment">

                        <form id="algin-form" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="id_nhatro" value="<?php echo $data1['id_nhatro'] ?>" />
                            <div class="form-group">
                                <h4>Nhập bình luận</h4>
                                <label for="message">Nội dung</label>
                                <textarea name="binhluan" id="" msg cols="30" rows="5" class="form-control" style="background-color: black; color: #ffffff"></textarea>
                            </div>
                            <input type="hidden" name="diem" id="hidden-diem">
                            <div class="form-group">
                                <label for="message">Ảnh 1 sản phẩm (Nếu có)</label>
                                <div class="col-md-10">
                                    <div class="image-upload-container">
                                        <input type="file" name="ImageUpload1" id="imageUpload" />
                                        <img id="previewImage" src="#" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message">Ảnh 2 sản phẩm (Nếu có)</label>
                                <div class="col-md-10">
                                    <div class="image-upload-container">
                                        <input type="file" name="ImageUpload2" id="imageUpload1" />
                                        <img id="previewImage1" src="#" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="videoUpload">Chọn video (Nếu có)</label>
                                <div class="col-md-10">
                                    <input type="file" name="VideoFile" class="form-control-file" id="videoUpload" accept="video/*">
                                    <video id="videoPreview" width="320" height="200" controls style="display: none; border-radius: 10px"></video>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="btn_binhluan" class="btn btn-block btn-danger " value="Đăng">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- End block content -->
    </main>

    <!-- Chuyền rating vào diem input hiiden -->
    <script>
        const ratingInputs = document.querySelectorAll('.rating input[type="radio"]');
        const hiddenDiemInput = document.getElementById('hidden-diem');

        // Loop through rating inputs
        ratingInputs.forEach(input => {
            // Check if the input is checked
            if (input.checked) {
                hiddenDiemInput.value = input.value;
            }

            // Attach click event listener to rating inputs
            input.addEventListener('click', function() {
                hiddenDiemInput.value = this.value;
            });
        });
    </script>

    <script>
        // ảnh 1
        var input = document.getElementById("imageUpload");
        var preview = document.getElementById("previewImage");

        input.addEventListener("change", function() {
            var file = this.files[0];

            if (file) {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview.setAttribute("src", this.result);
                    preview.style.display = "block";
                });

                reader.readAsDataURL(file);
            }
        });

        // ảnh 2
        var input1 = document.getElementById("imageUpload1");
        var preview1 = document.getElementById("previewImage1");

        input1.addEventListener("change", function() {
            var file = this.files[0];

            if (file) {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview1.setAttribute("src", this.result);
                    preview1.style.display = "block";
                });

                reader.readAsDataURL(file);
            }
        });

        // video
        const videoUpload = document.getElementById("videoUpload");
        const videoPreview = document.getElementById("videoPreview");

        videoUpload.addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    videoPreview.src = reader.result;
                    videoPreview.style.display = "block";
                }
            }
        });
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/popperjs/popper.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="./assets/js/app.js"></script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="./js/curcor.js"></script>
    <script src="./js/loading.js"></script>

    <!-- Check chưa đăng nhập không cho bình luận -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingInputs = document.querySelectorAll('.rating input[type="radio"]');
            const submitButton = document.querySelector('.btn.btn-block.btn-danger');

            submitButton.addEventListener('click', function(event) {
                // Kiểm tra xem người dùng đã đăng nhập hay chưa (kiểm tra biến $_SESSION['id'])
                if (!<?php echo isset($_SESSION['id']) ? 'true' : 'false'; ?>) {
                    event.preventDefault(); // Ngăn chặn việc submit form
                    alert('Bạn cần phải đăng nhập.'); // Hiển thị thông báo alert
                    window.location.href = '../login/login.php'; // Chuyển hướng sang trang đăng nhập
                }
            });

            // Loop qua các input rating
            ratingInputs.forEach(input => {
                // Kiểm tra xem input đã được checked hay chưa
                if (input.checked) {
                    // Gán giá trị của input đã checked vào input ẩn (hiddenDiemInput)
                    hiddenDiemInput.value = input.value;
                }

                // Gắn sự kiện click vào các input rating
                input.addEventListener('click', function() {
                    // Gán giá trị của input đã click vào input ẩn (hiddenDiemInput)
                    hiddenDiemInput.value = this.value;
                });
            });
        });
    </script>
</body>

</html>