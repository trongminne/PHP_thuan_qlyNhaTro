<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';
?>

<!-- Số lượng -->

<?php
$qr_khuvuc = mysqli_query($conn, 'SELECT COUNT(*) FROM khuvuc');
$count_khuvuc = mysqli_fetch_array($qr_khuvuc);

$qr_nhatro = mysqli_query($conn, 'SELECT COUNT(*) FROM nhatro');
$count_nhatro = mysqli_fetch_array($qr_nhatro);

$qr_tintuc = mysqli_query($conn, 'SELECT COUNT(*) FROM tintuc');
$count_tintuc = mysqli_fetch_array($qr_tintuc);
?>

<!-- Xuất bảng -->

<?php
$data_nhatro = mysqli_query(
    $conn,
    'SELECT id_nhatro , tenkhuvuc, name, tenchu, sdt, image FROM khuvuc INNER JOIN nhatro ON khuvuc.id_khuvuc = nhatro.id_khuvuc;'
);

$data_taikhoan = mysqli_query(
    $conn,
    'SELECT * FROM taikhoan'
);

$data_tintuc = mysqli_query($conn, 'SELECT * FROM tintuc');

$data_khuvuc = mysqli_query($conn, 'SELECT * FROM khuvuc');
$data_nap = mysqli_query($conn, 'SELECT email, sotien, trangthai FROM taikhoan INNER JOIN lichsu_nap ON taikhoan.id = lichsu_nap.id_taikhoan');
?>


<?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '1') { ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">
            <div class="row">

                <div class="col-sm-4 grid-margin ">
                    <div class="card" id="mode_khuvuc">
                        <div class="card-body padding-home">
                            <h2>Khu vực</h2>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">Số lượng</h3>
                                        <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                            <?php echo $count_khuvuc['COUNT(*)']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right padding-icon">
                                    <i class=" mdi mdi-home icon-lg  text-primary ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 grid-margin">
                    <div class="card" id="mode_nhatro">
                        <div class="card-body padding-home">
                            <h2>Nhà trọ</h2>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">Số lượng</h3>
                                        <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                            <?php echo $count_nhatro['COUNT(*)']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right padding-icon">
                                    <i class="icon-lg mdi mdi-open-in-new text-danger ml-auto"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 grid-margin">
                    <div class="card" id="mode_tintuc">
                        <div class="card-body padding-home">
                            <h2>Tin tức</h2>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">Số lượng</h3>
                                        <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                            <?php echo $count_tintuc['COUNT(*)']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right padding-icon">
                                    <i class="icon-lg mdi mdi-image-area-close text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bảng khu vực -->
            <form action="" method="POST">

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_khuvuc">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_khuvuc">Khu vực</span> &nbsp; <button class="btn btn-danger" onclick="return confirmHuyDangKi()"> Xoá </button>
                                </h4>

                                <script>
                                    function confirmHuyDangKi() {
                                        var checkboxes = document.getElementsByName('del_khuvuc[]');
                                        var isChecked = false;
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i].checked) {
                                                isChecked = true;
                                                break;
                                            }
                                        }
                                        if (!isChecked) {
                                            alert('Bạn chưa chọn huỷ!');
                                            return false;
                                        }
                                        return confirm('Bạn chắc chắn muốn huỷ?');
                                    }
                                </script>

                                <div class="table-responsive">
                                    <table class="table" id="data_khuvuc">
                                        <thead>

                                            <tr>
                                                <th>
                                                    <!-- Chọn tất cả -->
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="checkkhuvuc" onchange="checkAll(this)" class="form-check-input">
                                                        </label>
                                                    </div>

                                                </th>

                                                <th> STT </th>
                                                <th> Tên khu vực </th>
                                                <th> Sửa </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_khuvuc as $key => $value) { ?>

                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" id="checkkhuvuc" name="del_khuvuc[]" value="<?php echo $value['id_khuvuc']; ?>" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <?php echo $key + 1; ?>
                                                    </td>

                                                    <td> <?php echo $value['tenkhuvuc']; ?></td>

                                                    <td>

                                                        <a href="edit_khuvuc.php?id=<?php echo $value['id_khuvuc']; ?>" class="btn btn-primary">

                                                            Sửa

                                                        </a>

                                                    </td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Bảng Nhà Trọ -->
            <form action="./xuat_excel.php" method="POST">

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_nhatro">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_nhatro">Nhà trọ</span> &nbsp; <button class="btn btn-danger" onclick="return confirmHuyDangKi3()"> Xoá </button>
                                <button class="btn btn-success" type="submit" name="xuat_nhatro"> Xuất excel </button>
                                </h4>

                                <script>
                                    function confirmHuyDangKi3() {
                                        var checkboxes = document.getElementsByName('del_nhatro[]');
                                        var isChecked = false;
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i].checked) {
                                                isChecked = true;
                                                break;
                                            }
                                        }
                                        if (!isChecked) {
                                            alert('Bạn chưa chọn huỷ!');
                                            return false;
                                        }
                                        return confirm('Bạn chắc chắn muốn huỷ?');
                                    }
                                </script>
                                <div class="table-responsive">
                                    <table class="table" id="data_nhatro">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <!-- Chọn tất cả -->
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="checknhatro" onchange="checkAll1(this)" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </th>
                                                <th> STT </th>
                                                <th> Khu vực </th>
                                                <th> Tên trọ </th>
                                                <th> Tên chủ </th>
                                                <th> Số điện thoại </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_nhatro as $key => $value) { ?>

                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="del_nhatro[]" id="checknhatro" value="<?php echo $value['id_nhatro']; ?>" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $key + 1; ?>
                                                    </td>
                                                    <td> <?php echo $value['tenkhuvuc']; ?></td>
                                                    <td><a href="/product/product-view.php?id=<?php echo $value['id_nhatro'] ?>"><?php echo $value['name']; ?></a></td>
                                                    <td> <?php echo $value['tenchu']; ?> </td>
                                                    <td> <?php echo $value['sdt']; ?> </td>


                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Bảng tài khoản -->


            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_taikhoan">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_taikhoan">Tài khoản</span> &nbsp; <button class="btn btn-danger" onclick="return confirmHuyDangKi3()"> Xoá </button>

                            </h4>

                            <script>
                                function confirmHuyDangKi3() {
                                    var checkboxes = document.getElementsByName('del_taikhoan[]');
                                    var isChecked = false;
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        if (checkboxes[i].checked) {
                                            isChecked = true;
                                            break;
                                        }
                                    }
                                    if (!isChecked) {
                                        alert('Bạn chưa chọn huỷ!');
                                        return false;
                                    }
                                    return confirm('Bạn chắc chắn muốn huỷ?');
                                }
                            </script>
                            <div class="table-responsive">
                                <table class="table" id="data_taikhoan">
                                    <thead>
                                        <tr>
                                            <th>
                                                <!-- Chọn tất cả -->
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" id="checktaikhoan" onchange="checkAll3(this)" class="form-check-input">
                                                    </label>
                                                </div>
                                            </th>
                                            <th> STT </th>
                                            <th> Tài khoản </th>
                                            <th> Email </th>
                                            <th> Vị trí </th>
                                            <th>Chuyển sang chủ trọ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_taikhoan as $key => $value) {
                                            // Lấy id của tài khoản
                                            $userId = $value['id'];

                                            // Xử lý khi bấm vào nút "Chủ trọ"
                                            if (isset($_POST['change_role']) && $_POST['userId'] == $userId) {
                                                // Thực hiện thay đổi quyền của tài khoản
                                                $newRole = 2; // Quyền chủ trọ
                                                // Thực hiện truy vấn hoặc các thao tác cần thiết để cập nhật quyền của tài khoản
                                           
                                                $updateQuery = "UPDATE taikhoan SET quyen = $newRole WHERE id = $userId";
                                                mysqli_query($conn, $updateQuery);

                                                // Sau khi thay đổi quyền thành công, có thể thực hiện các hành động khác (ví dụ: thông báo, reload trang, v.v.)
                                                echo "<script>alert('Thay đổi quyền thành công');</script>";
                                                echo "<script>window.location.href = 'index.php';</script>";
                                                exit(); // Dừng thực hiện các câu lệnh tiếp theo
                                            }
                                        ?>

                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="del_taikhoan[]" id="checktaikhoan" value="<?php echo $value['id']; ?>" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $key + 1; ?>
                                                </td>
                                                <td> <?php echo $value['taikhoan']; ?></td>
                                                <td><?php echo $value['email']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($value['quyen'] == 1) {
                                                        echo 'Admin';
                                                    } elseif ($value['quyen'] == 2) {
                                                        echo 'Chủ trọ';
                                                    } else {
                                                        echo 'Sinh viên';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($value['quyen'] == 0) { ?>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                                                            <button type="submit" name="change_role" class="btn btn-primary">Chuyển</button>
                                                        </form>
                                                    <?php } else { ?>
                                                <td></td>
                                            <?php } ?>
                                            </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Lăng nghe sự kiện thay đổi -->

            <!-- Bảng Tin tức -->
            <form action="./code/xoa_tintuc.php" method="POST">

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_tintuc">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_tintuc">Tin tức</span> &nbsp; <button class="btn btn-danger" onclick="return confirmHuyDangKi2()"> Xoá </button>

                                </h4>
                                <script>
                                    function confirmHuyDangKi2() {
                                        var checkboxes = document.getElementsByName('del[]');
                                        var isChecked = false;
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i].checked) {
                                                isChecked = true;
                                                break;
                                            }
                                        }
                                        if (!isChecked) {
                                            alert('Bạn chưa chọn huỷ!');
                                            return false;
                                        }
                                        return confirm('Bạn chắc chắn muốn huỷ?');
                                    }
                                </script>
                                <div class="table-responsive">

                                    <table class="table" id="data_tintuc">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <!-- Chọn tất cả -->
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="checktintuc" onchange="checkAll2(this)" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </th>
                                                <th> STT </th>
                                                <th> Tiêu đề </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_tintuc as $key => $value) { ?>

                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="del[]" id="checktintuc" value="<?php echo $value['id']; ?>" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $key + 1; ?>
                                                    </td>
                                                    <td> <?php echo $value['tieude']; ?></td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Bảng nạp -->
            <form action="./xuat_excel.php" method="POST">

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_nap">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_nap">Nạp tiền</span> &nbsp;
                                    <button class="btn btn-success" type="submit" name="xuat_nap"> Xuất excel </button>
                                </h4>

                                <div class="table-responsive">

                                    <table class="table" id="data_nap">
                                        <thead>
                                            <tr>

                                                <th> STT </th>
                                                <th> Email </th>
                                                <th> Số tiền </th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_nap as $key => $value) { ?>

                                                <tr>

                                                    <td>
                                                        <?php echo $key + 1; ?>
                                                    </td>
                                                    <td> <?php echo $value['email']; ?></td>

                                                    <td> <?php echo number_format($value['sotien'], 0, '.', ','); ?> </td>
                                                    <td>
                                                        <?php
                                                        if ($value['trangthai'] == 0) {
                                                            echo 'Thành công';
                                                        } else {
                                                            echo 'Thất bại';
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script src="./assets/js/mode_dk.js"></script>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include '../include/footer.php'; ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include '../include/scripts.php'; ?>
    </body>

    </html>

<?php } else {
    echo "<script>alert('Bạn không phải admin bạn cần đăng nhập bằng tài khoản admin để quản trị dữ liệu!')</script>";
}
?>