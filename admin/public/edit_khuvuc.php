<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM khuvuc WHERE id_khuvuc = '$id'");
    $xuatdl = mysqli_fetch_array($data);
}

if (isset($_POST['tenkhuvuc'])) {
    // echo "<pre>";
    // print_r($_POST);
    $tenkhuvuc = $_POST['tenkhuvuc'];

    $sql = "UPDATE khuvuc SET tenkhuvuc = '$tenkhuvuc' WHERE id_khuvuc = '$id'";
    $qr = mysqli_query($conn, $sql);
    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
        swal({
            title: "Thành công!",
            text: "Sửa thành công khu vực!",
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



<?php if (isset($_SESSION['taikhoan']) & $_SESSION['taikhoan'] == 'admin') { ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="mode_khuvuc">
                        <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                        <div class="card-body">
                            <h4 class="card-title" id="mode_nhatro">Sửa khu vực</h4>

                            <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">ID khu vực</label>
                                    <input name="id_khuvuc" type="text" class="form-control" id="exampleInputName1" style="color: #000;" value="<?php echo $xuatdl['id_khuvuc'] ?>" disabled>
                                    <br>
                                    <label for="exampleInputName1">Tên khu vực</label>
                                    <input name="tenkhuvuc" required type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên khu vực" style="color: #ffff;" value="<?php echo $xuatdl['tenkhuvuc'] ?>">
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