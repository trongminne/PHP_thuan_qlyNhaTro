<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<body>
    <?php

    if (isset($_POST['tenkhuvuc'])) {

        $tenkhuvuc = $_POST['tenkhuvuc'];

        $sql = "INSERT INTO khuvuc(tenkhuvuc) VALUES ('$tenkhuvuc')";
        $qr = mysqli_query($conn, $sql);
        if ($qr) {
            // Hiển thị thông báo chèn thành công
            echo '<script>
            swal({
                title: "Thành công!",
                text: "Thêm thành công khu vực!",
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

    <?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '1') { ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" id="mode_body">

                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card" id="mode_khuvuc">
                            <!-- Lấy tạm mode khu vực vì nó đang bị xung đột -->
                            <div class="card-body">
                                <h4 class="card-title" id="mode_nhatro">Thêm khu vực</h4>

                                <form class="forms-sample" method="POST" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tên khu vực</label>
                                        <input name="tenkhuvuc" autofocus required type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên khu vực" style="color: #ffff;">
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