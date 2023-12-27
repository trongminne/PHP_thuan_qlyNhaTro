<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$nhatro = mysqli_query($conn, "SELECT * FROM nhatro");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nhatro = mysqli_query($conn, "SELECT * FROM nhatro WHERE id_nhatro = $id");
    $data = mysqli_fetch_assoc($nhatro);

    // lấy ảnh từ bảng product
    $img_nhatro = mysqli_query($conn, "SELECT * FROM img_nhatro WHERE id_nhatro = $id");
}

$khuvuc = mysqli_query($conn, "SELECT * FROM khuvuc");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $id_khuvuc = $_POST['id_khuvuc'];
    $price = $_POST['price'];
    $tenchu = $_POST['tenchu'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $link_map = $_POST['link_map'];
    $soluong = $_POST['soluong'];
    $loai = $_POST['loai'];
    $dess = $_POST['dess'];
    $trangthai = $_POST['trangthai'];
    $id_taikhoan = $_SESSION['id'];


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

    // Kiểm tra nhiều ảnh

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        if (!empty($file_names[0])) {
            mysqli_query($conn, "DELETE FROM img_nhatro WHERE id_nhatro = $id");
            // die();
            foreach ($file_names as $key => $value) {
                move_uploaded_file($files['tmp_name'][$key], './upload/' . $value);
            }

            foreach ($file_names as $key => $value) {
                mysqli_query($conn, "INSERT INTO img_nhatro(id_nhatro, name_img) VALUES ('$id', '$value')");
            }
        }
    }

    $sql = "UPDATE nhatro SET name = '$name', id_khuvuc = '$id_khuvuc', soluong = '$soluong', loai = '$loai', price = '$price', image = '$file_name', tenchu = '$tenchu', sdt = '$sdt', diachi = '$diachi', link_map = '$link_map', dess = '$dess', trangthai = '$trangthai' WHERE id_nhatro = '$id'";

    $qr = mysqli_query($conn, $sql);
    // $id_nhatro = mysqli_insert_id($conn);


    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
        swal({
            title: "Thành công!",
            text: "Sửa thành công nhà trọ!",
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

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="mode_khuvuc">
                        <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                        <div class="card-body">
                            <h4 class="card-title" id="mode_nhatro">Sửa nhà trọ</h4>

                            <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên trọ</label>
                                    <input name="name" value="<?php echo $data['name'] ?>" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên trọ" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên chủ</label>
                                    <input name="tenchu" value="<?php echo $data['tenchu'] ?>" class="form-control" id="exampleInputName1" placeholder="Nhập tên chủ trọ" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Giá</label>
                                    <input name="price" value="<?php echo $data['price'] ?>" type="number" class="form-control" id="exampleInputName1" required placeholder="Nhập giá" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Số lượng phòng</label>
                                    <input name="soluong" value="<?php echo $data['soluong'] ?>" type="number" class="form-control" id="exampleInputName1" required placeholder="Nhập giá" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Loại phòng</label>
                                    <br>
                                    <input type="radio" id="" name="loai" value="1" <?php if ($data['loai'] == 1) { ?> checked <?php } ?>>
                                    <label for="html" class="custom_radio" style="margin: 4px 0 0 10px;"> Khép kín
                                    </label><br>
                                    <input type="radio" id="" name="loai" value="0" <?php if ($data['loai'] == 0) { ?> checked <?php } ?>>
                                    <label for="css" class="custom_radio" style="margin: 4px 0 0 10px;">Không
                                        kín</label><br>

                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Khu vực</label>
                                    <select name="id_khuvuc" class="form-control" id="exampleSelectGender" style="color: #ffff;" required>
                                        <option value="">Chọn khu vực nhà trọ</option>


                                        <?php foreach ($khuvuc as $key => $value) { ?>
                                            <option value="<?php echo $value['id_khuvuc'] ?>" <?php echo (($value['id_khuvuc'] == $data['id_khuvuc']) ? 'selected' : '') ?>>
                                                <?php echo $value['tenkhuvuc'] ?></option>
                                        <?php } ?>


                                    </select>
                                </div>


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
                                <br>
                                <div class="form-group">
                                    <label>Ảnh mô tả (Ảnh theo chiều ngang tốt nhất là tỉ lệ 5:4)</label>

                                    <div class="container">
                                        <br>
                                        <input class="anh_mo_ta" type="file" id="file-input" name="images[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
                                        <label for="file-input" class="label_anh_mo_ta">
                                            <i class="fas fa-upload"></i> &nbsp; Chọn ảnh
                                        </label>
                                        <p id="num-of-files"></p>
                                        <div id="images">
                                            <?php foreach ($img_nhatro as $key => $value) { ?>
                                                <img class="edit_img_mota" src="./upload/<?php echo $value['name_img'] ?>" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputCity1">Số điện thoại</label>
                                    <input name="sdt" value="<?php echo $data['sdt'] ?>" type="number" class="form-control" id="exampleInputCity1" required placeholder="Nhập số điện thoại" style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">Địa chỉ</label>
                                    <input name="diachi" value="<?php echo $data['diachi'] ?>" type="text" class="form-control" id="exampleInputCity1" placeholder="Nhập địa chỉ" style="color: #ffff;" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">Link map</label>
                                    <textarea name="link_map" class="form-control" id="exampleTextarea1" rows="4" style="color: #ffff;"><?php echo $data['link_map'] ?>
                                </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Mô tả</label>
                                    <textarea name="dess" class="form-control" id="exampleTextarea1" rows="4" style="color: #ffff;"><?php echo $data['dess'] ?>
                                </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Trạng thái</label>
                                    <br>


                                    <input type="radio" id="" name="trangthai" value="1" <?php if ($data['trangthai'] == 1) { ?> checked <?php } ?>>
                                    <label for="html" class="custom_radio" style="margin: 4px 0 0 10px;">Còn
                                        phòng</label><br>
                                    <input type="radio" id="" name="trangthai" value="0" <?php if ($data['trangthai'] == 0) { ?> checked <?php } ?>>
                                    <label for="css" class="custom_radio" style="margin: 4px 0 0 10px;">Không
                                        còn</label><br>

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