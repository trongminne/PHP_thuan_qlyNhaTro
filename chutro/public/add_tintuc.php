<?php
session_start();
include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$id_taikhoan = $_SESSION['id'];
$tintuc = mysqli_query($conn, "SELECT * FROM tintuc");


if (isset($_POST['tieude'])) {
    $tieude = $_POST['tieude'];
    $noidung1 = $_POST['noidung1'];
    $tenanh1 = $_POST['tenanh1'];
    $noidung2 = $_POST['noidung2'];
    $tenanh2 = $_POST['tenanh2'];
    $noidung3 = $_POST['noidung3'];
    $tenanh3 = $_POST['tenanh3'];
    $noidung4 = $_POST['noidung4'];
    $tenanh4 = $_POST['tenanh4'];
    $noidung5 = $_POST['noidung5'];
    $tenanh5 = $_POST['tenanh5'];
    $tenanhconlai = $_POST['tenanhconlai'];

    //   Kiểm tra ảnh đại diện
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name);
    }

    //   Kiểm tra ảnh 1
    if (isset($_FILES['image1'])) {
        $file = $_FILES['image1'];
        $file_name1 = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name1);
    }

    //   Kiểm tra ảnh 2
    if (isset($_FILES['image2'])) {
        $file = $_FILES['image2'];
        $file_name2 = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name2);
    }

    //   Kiểm tra ảnh 3
    if (isset($_FILES['image3'])) {
        $file = $_FILES['image3'];
        $file_name3 = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name3);
    }

    //   Kiểm tra ảnh 4
    if (isset($_FILES['image4'])) {
        $file = $_FILES['image4'];
        $file_name4 = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name4);
    }

    //   Kiểm tra ảnh 5
    if (isset($_FILES['image5'])) {
        $file = $_FILES['image5'];
        $file_name5 = $file['name'];

        move_uploaded_file($file['tmp_name'], './upload/' . $file_name5);
    }

    // Kiểm tra nhiều ảnh

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], './upload/' . $value);
        }
    }

    $sql = "INSERT INTO tintuc(id_taikhoan, tieude, image, noidung1, image1, tenanh1, noidung2, image2, tenanh2, noidung3, image3, tenanh3, noidung4, image4, tenanh4, noidung5, image5, tenanh5, tenanhconlai) VALUES ('$id_taikhoan', '$tieude', '$file_name', '$noidung1', '$file_name1','$tenanh1', '$noidung2', '$file_name2','$tenanh2', '$noidung3', '$file_name3','$tenanh3', '$noidung4', '$file_name4','$tenanh4', '$noidung5', '$file_name5', '$tenanh5', '$tenanhconlai')";
  
    $qr = mysqli_query($conn, $sql);
    $id_tintuc = mysqli_insert_id($conn);
    foreach ($file_names as $key => $value) {
        mysqli_query($conn, "INSERT INTO img_tintuc(id_tintuc, name_img) VALUE ('$id_tintuc', '$value')");
    }

    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
        swal({
            title: "Thành công!",
            text: "Thêm thành công tin tức!",
            icon: "success",
        }).then(function() {
        window.location.href = "index.php";
    });
    </script>';
    } else {
        // Hiển thị thông báo chèn không thành công
        echo '<script>
        swal({
            title: "Thất bại!",
            icon: "error",
            text: "Thêm thất bại!",
        }).then(function() {
        window.location.href = "index.php";
    });
    </script>';
    }
}

?>


<?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '2') { ?>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="mode_khuvuc">
                        <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                        <div class="card-body">
                            <h4 class="card-title" id="mode_nhatro">Thêm tin tức</h4>

                            <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tiêu đề tin tức</label>
                                    <input name="tieude" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tiêu đề" required autofocus style="color: #ffff;">
                                </div>


                                <!-- Ảnh đại diện bài -->
                                <div class="form-group">
                                    <label>Ảnh đại diện (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file" name="image" accept="image/*" required hidden>
                                        <div class="img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image">Thêm ảnh đại diện</button>
                                    </div>

                                </div>


                                <!-- Bốc cục 1 -->

                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 1</label>
                                    <input name="noidung1" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 1" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 1 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file1" name="image1" required accept="image/*" hidden>
                                        <div class="img-area1 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image1">Thêm ảnh 1</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 1</label>
                                    <input name="tenanh1" class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 1" style="color: #ffff;">
                                </div>

                                <!-- Bố cục 2 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 2</label>
                                    <input name="noidung2" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 2" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 2 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file2" name="image2" required accept="image/*" hidden>
                                        <div class="img-area2 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image2">Thêm ảnh 2</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 2</label>
                                    <input name="tenanh2" class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 2" style="color: #ffff;">
                                </div>

                                <!-- Bố cục 3 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 3</label>
                                    <input name="noidung3" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 3 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 3 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file3" name="image3" required accept="image/*" hidden>
                                        <div class="img-area3 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image3">Thêm ảnh 3</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 3</label>
                                    <input name="tenanh3" class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 3" style="color: #ffff;">
                                </div>

                                <!-- Bố cục 4 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 4</label>
                                    <input name="noidung4" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 4 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 4 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file4" name="image4" required accept="image/*" hidden>
                                        <div class="img-area4 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image4">Thêm ảnh 4</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 4</label>
                                    <input name="tenanh4" class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 4" style="color: #ffff;">
                                </div>

                                <!-- Bố cục 5 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 5</label>
                                    <input name="noidung5" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 5 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 5 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file5" name="image5" required accept="image/*" hidden>
                                        <div class="img-area5 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <h3>Thêm ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image5">Thêm ảnh 5</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 5</label>
                                    <input name="tenanh5" class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 5" style="color: #ffff;">
                                </div>


                                <!-- Ảnh còn lại  -->
                                <br>
                                <div class="form-group">
                                    <label>Ảnh Còn lại (Nếu tin tức nhiều hơn 5 ảnh trên hãy nhập hết ảnh còn lại vào
                                        đây)</label>

                                    <div class="container">
                                        <br>
                                        <input class="anh_mo_ta" type="file" id="file-input" name="images[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
                                        <label for="file-input" class="label_anh_mo_ta">
                                            <i class="fas fa-upload"></i> &nbsp; Chọn ảnh
                                        </label>
                                        <p id="num-of-files">Chưa có ảnh</p>
                                        <div id="images"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên những ảnh còn lại</label>
                                    <input name="tenanhconlai" class="form-control" id="exampleInputName1" placeholder="Nhập tên những ảnh còn lại" style="color: #ffff;">
                                </div>


                                <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <script src="./assets/js/mode_dk.js"></script>

            <?php
            include '../include/footer.php';

            ?>
            <?php
            include '../include/scripts.php';

            ?>
        <?php } else {
        echo "<script>alert('Bạn không phải admin bạn cần đăng nhập bằng tài khoản admin để quản trị dữ liệu!')</script>";
    }
        ?>