<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>

<!-- Add excel -->

<?php
//  Include thư viện PHPExcel_IOFactory
include '../Classes/PHPExcel/IOFactory.php';
include '../Classes/PHPExcel.php';

if (isset($_POST['import'])) {
    $extension = @end(explode('.', $_FILES['excel']['name'])); // For getting Extension of selected file

    $allowed_extension = ['xls', 'xlsx', 'csv']; //allowed extension
    if (in_array($extension, $allowed_extension)) {
        //check selected file extension is present in allowed extension array
        $file = $_FILES['excel']['tmp_name']; // getting temporary source of excel file
        $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $id_khuvuc = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(1, $row)->getValue()
                );
                $id_taikhoan = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(2, $row)->getValue()
                );
                $name = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(3, $row)->getValue()
                );
                $price = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(4, $row)->getValue()
                );
                $tiencoc = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(5, $row)->getValue()
                );
                $soluong = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(6, $row)->getValue()
                );
                $loai = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(7, $row)->getValue()
                );
                $tenchu = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(8, $row)->getValue()
                );
                $sdt = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(9, $row)->getValue()
                );
                $diachi = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(10, $row)->getValue()
                );
                $link_map = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(11, $row)->getValue()
                );
                $dess = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(12, $row)->getValue()
                );
                $trangthai = mysqli_real_escape_string(
                    $conn,
                    $worksheet->getCellByColumnAndRow(13, $row)->getValue()
                );


                $query = mysqli_query($conn, "INSERT INTO nhatro(id_khuvuc, id_taikhoan, name, price, tiencoc, soluong, loai, tenchu, sdt, diachi, link_map, dess, trangthai) VALUES ('$id_khuvuc','$id_taikhoan', '$name', '$price','$tiencoc','$soluong', '$loai', '$tenchu','$sdt', '$diachi','$link_map', '$dess', '$trangthai')");
            }
        }
        header('location: index.php');
    } else {
        echo 'err';
    }
}
?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

$khuvuc = mysqli_query($conn, "SELECT * FROM khuvuc");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $id_khuvuc = $_POST['id_khuvuc'];
    $price = $_POST['price'];
    $tenchu = $_POST['tenchu'];
    $sdt = $_POST['sdt'];
    $tiencoc = $_POST['tiencoc'];
    $diachi = $_POST['diachi'];
    $link_map = $_POST['link_map'];
    $dess = $_POST['dess'];
    $trangthai = $_POST['trangthai'];
    $soluong = $_POST['soluong'];
    $loai = $_POST['loai'];
    $id_taikhoan = $_SESSION['id'];

    //   Kiểm tra 1 ảnh
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], './upload/' . $file_name);
    }

    // Kiểm tra nhiều ảnh

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], './upload/' . $value);
        }
    }

    $sql = "INSERT INTO nhatro(name, id_khuvuc, price, tiencoc, soluong, loai, image, tenchu, sdt, diachi, link_map, dess, trangthai, id_taikhoan) VALUES ('$name','$id_khuvuc', '$price', '$tiencoc', '$soluong', '$loai', '$file_name', '$tenchu', '$sdt', '$diachi', '$link_map', '$dess', '$trangthai', '$id_taikhoan')";
    $qr = mysqli_query($conn, $sql);
    $id_nhatro = mysqli_insert_id($conn);
    foreach ($file_names as $key => $value) {
        mysqli_query($conn, "INSERT INTO img_nhatro(id_nhatro, name_img) VALUE ('$id_nhatro', '$value')");
    }

    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
        swal({
            title: "Thành công!",
            text: "Thêm thành công nhà trọ!",
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

 <!-- POPUP add excel -->

 <div class="modal fade" id="addexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: #191C24;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Excel (File đuôi '.xlsx')</label>
                            <input type="file" name="excel">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" name="import" class="btn btn-primary">Thêm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="main-panel">
        <div class="content-wrapper edit_768_backgroud" id="mode_body">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="mode_khuvuc">
                        <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                        <div class="card-body">

                            <h4 class="card-title" id="mode_nhatro">
                                Thêm nhà trọ
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addexcel" style="margin: 0 0 0 5px;">
                                        Thêm excel
                                    </button>
                            </h4>

                           


                            <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên trọ</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên trọ" autofocus required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tên chủ</label>
                                    <input name="tenchu" class="form-control" id="exampleInputrequiredName1" placeholder="Nhập tên chủ trọ" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Giá</label>
                                    <input name="price" type="number" class="form-control" id="exampleInputName1" placeholder="Nhập giá" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Tiền cọc (Không cần điền 0)</label>
                                    <input name="tiencoc" type="number" class="form-control" id="exampleInputName1" placeholder="Nhập tiền cọc" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Số lượng phòng</label>
                                    <input name="soluong" type="number" class="form-control" id="exampleInputName1" placeholder="Nhập số lượng phòng" required style="color: #ffff;">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Loại phòng</label>
                                    <br>
                                    <input type="radio" id="" name="loai" value="1" checked>
                                    <label for="html" class="custom_radio" style="margin: 4px 0 0 10px;">Khép kín</label><br>
                                    <input type="radio" id="" name="loai" value="0">
                                    <label for="html" class="custom_radio" style="margin: 4px 0 0 10px;">Không khép kín </label><br>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Khu vực</label>
                                    <select name="id_khuvuc" class="form-control" id="exampleSelectGender" style="color: #ffff;" required="required">
                                        <option value="">Chọn khu vực nhà trọ</option>
                                        <?php foreach ($khuvuc as $key => $value) { ?>

                                            <option value="<?php echo $value['id_khuvuc'] ?>"><?php echo $value['tenkhuvuc']; ?>
                                            </option>

                                        <?php } ?>

                                    </select>
                                </div>

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


                                <br>
                                <div class="form-group">
                                    <label>Ảnh mô tả (Ảnh theo chiều ngang tốt nhất là tỉ lệ 5:4)</label>

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
                                    <label for="exampleInputCity1">Số điện thoại</label>
                                    <input name="sdt" type="number" class="form-control" id="exampleInputCity1" placeholder="Nhập số điện thoại" style="color: #ffff;" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">Địa chỉ</label>
                                    <input name="diachi" type="text" class="form-control" id="exampleInputCity1" placeholder="Nhập địa chỉ" style="color: #ffff;" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">
                                        Link map
                                        <a class="custom_hd" href="./hd/hd_linkmap.html" style="text-decoration: none;">Hướng dẫn</a>
                                    </label>
                                    <input name="link_map" type="text" class="form-control" id="exampleInputCity1" placeholder="Nhập link map" style="color: #ffff;" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Mô tả</label>
                                    <textarea name="dess" class="form-control" id="exampleTextarea1" rows="4" style="color: #ffff;" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Trạng thái</label>
                                    <br>
                                    <input type="radio" id="" name="trangthai" value="1" checked>
                                    <label for="html" class="custom_radio" style="margin: 4px 0 0 10px;">Còn
                                        phòng</label><br>


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