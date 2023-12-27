<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

$tintuc = mysqli_query($conn, "SELECT * FROM tintuc");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tintuc = mysqli_query($conn, "SELECT * FROM tintuc WHERE id = $id");
    $data = mysqli_fetch_assoc($tintuc);

    // lấy ảnh từ bảng product
    $img_tintuc = mysqli_query($conn, "SELECT * FROM img_tintuc WHERE id_tintuc = $id");
}

$khuvuc = mysqli_query($conn, "SELECT * FROM khuvuc");

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

    //   Kiểm tra 1 ảnh
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        if (empty($file_name)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name = $data['image']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name);
        }
    }

    //   Kiểm tra ảnh 1
    if (isset($_FILES['image1'])) {
        $file = $_FILES['image1'];
        $file_name_image1 = $file['name'];
        if (empty($file_name_image1)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name_image1 = $data['image1']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name_image1);
        }
    }


    //   Kiểm tra ảnh 2
    if (isset($_FILES['image2'])) {
        $file = $_FILES['image2'];
        $file_name_image2 = $file['name'];
        if (empty($file_name_image2)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name_image2 = $data['image2']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name_image2);
        }
    }

    //   Kiểm tra ảnh 3
    if (isset($_FILES['image3'])) {
        $file = $_FILES['image3'];
        $file_name_image3 = $file['name'];
        if (empty($file_name_image3)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name_image3 = $data['image3']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name_image3);
        }
    }

    //   Kiểm tra ảnh 4
    if (isset($_FILES['image4'])) {
        $file = $_FILES['image4'];
        $file_name_image4 = $file['name'];
        if (empty($file_name_image4)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name_image4 = $data['image4']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name_image4);
        }
    }

    //   Kiểm tra ảnh 5
    if (isset($_FILES['image5'])) {
        $file = $_FILES['image5'];
        $file_name_image5 = $file['name'];
        if (empty($file_name_image5)) {
            // empaty: ngược lại với isset - nó kiểm tra dỗng.
            $file_name_image5 = $data['image5']; // VD ở đây là trường hợp người dùng không chọn ảnh => dỗng thì lấy lại về giá trị name img
        } else { // trường hợp người dùng chọn ảnh

            move_uploaded_file($file['tmp_name'], './upload/' . $file_name_image5);
        }
    }


    // Kiểm tra nhiều ảnh

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        if (!empty($file_names[0])) {
            mysqli_query($conn, "DELETE FROM img_tintuc WHERE id_tintuc = $id");
            // die();
            foreach ($file_names as $key => $value) {
                move_uploaded_file($files['tmp_name'][$key], './upload/' . $value);
            }

            foreach ($file_names as $key => $value) {
                mysqli_query($conn, "INSERT INTO img_tintuc(id_tintuc, name_img) VALUES ('$id', '$value')");
            }
        }
    }

    $sql = "UPDATE tintuc SET tieude = '$tieude', image = '$file_name', noidung1 = '$noidung1', image1 = '$file_name_image1', tenanh1 = '$tenanh1', noidung2 = '$noidung2', image2 = '$file_name_image2', tenanh2 = '$tenanh2', noidung3 = '$noidung3', image3 = '$file_name_image3', tenanh3 = '$tenanh3', noidung4 = '$noidung4', image4 = '$file_name_image4', tenanh4 = '$tenanh4',  noidung5 = '$noidung5', image5 = '$file_name_image5', tenanh5 = '$tenanh5', tenanhconlai = '$tenanhconlai' WHERE id = '$id'";

    $qr = mysqli_query($conn, $sql);
    // $id_nhatro = mysqli_insert_id($conn);


    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
        swal({
            title: "Thành công!",
            text: "Sửa thành công tin tức!",
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
            text: "Sửa thất bại!",
        }).then(function() {
        window.location.href = "index.php";
    });
    </script>';
    }
}

?>



<?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '2') { ?>


    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="mode_khuvuc">
                        <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                        <div class="card-body">
                            <h4 class="card-title" id="mode_nhatro">Sửa tin tức</h4>

                            <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tiêu đề tin tức</label>
                                    <input name="tieude" value="<?php echo $data['tieude'] ?>" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tiêu đề" required style="color: #ffff;">
                                </div>


                                <!-- Ảnh đạ diện bài -->
                                <div class="form-group">
                                    <label>Ảnh đại diện (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file" name="image" accept="image/*" hidden>
                                        <div class="img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image'] ?>" alt="" width="200px">
                                        </div>
                                        <input type="button" class="select-image" value="Sửa ảnh đại diện">
                                    </div>

                                </div>


                                <!-- Bốc cục 1 -->

                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 1</label>
                                    <input name="noidung1" value="<?php echo $data['noidung1'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 1" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 1 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file1" name="image1" required accept="image/*" hidden>
                                        <div class="img-area1 img-area" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image1'] ?>" alt="" width="200px">
                                            <h3>Sửa ảnh</h3>
                                            <p>Ảnh không vượt quá <span>10MB</span></p>
                                        </div>
                                        <button class="select-image select-image1">Sửa ảnh 1</button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 1</label>
                                    <input name="tenanh1" <?php if ($data['tenanh1'] != '') { ?> value="<?php echo $data['tenanh1'] ?>" <?php } ?> class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 1" style="color: #ffff;">
                                </div>
                                <br>
                                <br>
                                <br>
                                <!-- Bố cục 2 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 2</label>
                                    <input name="noidung2" value="<?php echo $data['noidung2'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 2" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 2 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file2" name="image2" accept="image/*" hidden>
                                        <div class="img-area img-area2" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image2'] ?>" alt="" width="200px">
                                        </div>
                                        <input type="button" class="select-image select-image2" value="Sửa ảnh 2">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 2</label>
                                    <input name="tenanh2" <?php if ($data['tenanh2'] != '') { ?> value="<?php echo $data['tenanh2'] ?>" <?php } ?> class=" form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 2" style="color: #ffff;">
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <!-- Bố cục 3 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 3</label>
                                    <input name="noidung3" value="<?php echo $data['noidung3'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 3 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 3 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file3" name="image3" accept="image/*" hidden>
                                        <div class="img-area img-area3" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image3'] ?>" alt="" width="200px">
                                        </div>
                                        <input type="button" class="select-image select-image3" value="Sửa ảnh 3">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 3</label>
                                    <input name="tenanh3" <?php if ($data['tenanh3'] != '') { ?> value="<?php echo $data['tenanh3'] ?>" <?php } ?> class="form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 3" style="color: #ffff;">
                                </div>
                                <br>
                                <br>
                                <br>
                                <!-- Bố cục 4 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 4</label>
                                    <input name="noidung4" value="<?php echo $data['noidung4'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 4 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 4 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file4" name="image4" accept="image/*" hidden>
                                        <div class="img-area img-area4" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image4'] ?>" alt="" width="200px">
                                        </div>
                                        <input type="button" class="select-image select-image4" value="Sửa ảnh 4">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 4</label>
                                    <input name="tenanh4" <?php if ($data['tenanh4'] != '') { ?> value="<?php echo $data['tenanh4'] ?>" <?php } ?> class=" form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 4" style="color: #ffff;">

                                </div>
                                <br>
                                <br>
                                <br>
                                <!-- Bố cục 5 -->
                                <div class="form-group">
                                    <label for="exampleInputName1">Nội dung 5</label>
                                    <input name="noidung5" value="<?php echo $data['noidung5'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập nội dung đoạn 5 (Nếu có)" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh 5 (Đuôi .jpg/.png và ảnh không được số cuối kiểu vd: a1
                                        (1).png)</label>
                                    <div class="container">
                                        <input type="file" id="file5" name="image5" accept="image/*" hidden>
                                        <div class="img-area img-area5" data-img="">
                                            <i class='bx bxs-cloud-upload icon'></i>
                                            <img class="edit_img_daidien" src="./upload/<?php echo $data['image5'] ?>" alt="" width="200px">
                                        </div>
                                        <input type="button" class="select-image select-image5" value="Sửa ảnh 5">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên ảnh 5</label>
                                    <input name="tenanh5" <?php if ($data['tenanh5'] != '') { ?> value="<?php echo $data['tenanh5'] ?>" <?php } ?> class=" form-control" id="exampleInputName1" placeholder="Nhập tên ảnh 5" style="color: #ffff;">
                                </div>

                                <br>
                                <br>
                                <br>

                                <!-- Ảnh còn lại  -->

                                <div class="form-group">
                                    <label>Ảnh Còn lại (Nếu tin tức nhiều hơn 5 ảnh trên hãy nhập hết ảnh còn lại vào
                                        đây)</label>

                                    <div class="container">
                                        <br>
                                        <input class="anh_mo_ta" type="file" id="file-input" name="images[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
                                        <label for="file-input" class="label_anh_mo_ta">
                                            <i class="fas fa-upload"></i> &nbsp; Chọn ảnh
                                        </label>
                                        <p id="num-of-files"></p>
                                        <div id="images">
                                            <?php foreach ($img_tintuc as $key => $value) { ?>
                                                <img class="edit_img_mota" src="./upload/<?php echo $value['name_img'] ?>" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputName1">Tên những ảnh còn lại</label>
                                    <input name="tenanhconlai" <?php if ($data['tenanhconlai'] != '') { ?> value="<?php echo $data['tenanhconlai'] ?>" <?php } ?> class="form-control" id="exampleInputName1" placeholder="Nhập tên những ảnh còn lại" style="color: #ffff;">
                                </div>


                                <button type="submit" class="btn btn-primary mr-2">Sửa</button>

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