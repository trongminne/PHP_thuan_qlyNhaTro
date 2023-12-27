<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';

?>

<!-- Số lượng -->

<?php

if (isset($_GET['key'])) {
  $noidung = $_GET['key'];
}

$qr_khuvuc = mysqli_query($conn, "SELECT COUNT(*) FROM khuvuc WHERE tenkhuvuc LIKE '%$noidung%'");
$count_khuvuc = mysqli_fetch_array($qr_khuvuc);

$qr_nhatro = mysqli_query($conn, "SELECT COUNT(*) FROM nhatro WHERE name LIKE '%$noidung%'");
$count_nhatro = mysqli_fetch_array($qr_nhatro);

$qr_tintuc = mysqli_query($conn, "SELECT COUNT(*) FROM tintuc WHERE tieude LIKE '%$noidung%'");
$count_tintuc = mysqli_fetch_array($qr_tintuc);

?>

<!-- Xuất bảng -->

<?php

$data_nhatro = mysqli_query($conn, "SELECT id_nhatro , tenkhuvuc, name, tenchu, sdt, image FROM khuvuc INNER JOIN nhatro ON khuvuc.id_khuvuc = nhatro.id_khuvuc WHERE name LIKE '%$noidung%'");

$data_tintuc = mysqli_query($conn, "SELECT * FROM tintuc WHERE tieude LIKE '%$noidung%'");

$data_khuvuc = mysqli_query($conn, "SELECT * FROM khuvuc WHERE tenkhuvuc LIKE '%$noidung%'");


?>


<?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '1') { ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" id="mode_body">
        <div class="row">

            <div class="col-sm-4 grid-margin ">
                <div class="card" id="mode_khuvuc">
                    <div class="card-body padding-home">
                        <h2>Khu vực<?php echo ' ' . $noidung ?></h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Số lượng</h3>
                                    <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                        <?php echo $count_khuvuc['COUNT(*)'] ?>
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
                        <h2>Nhà trọ <?php echo ' ' . $noidung ?></h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Số lượng</h3>
                                    <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                        <?php echo $count_nhatro['COUNT(*)'] ?>
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
                        <h2>Tin tức<?php echo ' ' . $noidung ?></h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Số lượng</h3>
                                    <p class="text-success ml-3 mb-0 font-weight-medium font-size">
                                        <?php echo $count_tintuc['COUNT(*)'] ?>
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
        <form action="./code/xoa_khuvuc.php" method="POST">

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_khuvuc">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_khuvuc">Khu vực</span> &nbsp; <button
                                    class="btn btn-danger"> Xoá </button> </h4>
                            <div class="table-responsive">
                                <table class="table" id="data_khuvuc">
                                    <thead>
                                        <tr>
                                            <th>
                                                <!-- Chọn tất cả -->
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" id="checkkhucvuc"
                                                            onchange="checkAll(this)" class="form-check-input">
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
                                                        <input type="checkbox" name="del[]" id="checkkhuvuc"
                                                            value="<?php echo $value['id_khuvuc'] ?>"
                                                            class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <?php echo $key + 1 ?>
                                            </td>

                                            <td> <?php echo $value['tenkhuvuc'] ?></td>

                                            <td>

                                                <a href="edit_khuvuc.php?id=<?php echo $value['id_khuvuc'] ?>"
                                                    class="btn btn-primary">

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
        <form action="./code/xoa_nhatro.php" method="POST">

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_nhatro">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_nhatro">Nhà trọ</span> &nbsp; <button
                                    class="btn btn-danger"> Xoá </button> </h4>
                            <div class="table-responsive">
                                <table class="table" id="data_nhatro">
                                    <thead>
                                        <tr>
                                            <th>
                                                <!-- Chọn tất cả -->
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" id="checknhatro"
                                                            onchange="checkAll1(this)" class="form-check-input">
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
                                                        <input type="checkbox" name="del[]" id="checknhatro"
                                                            value="<?php echo $value['id_nhatro'] ?>"
                                                            class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $key + 1 ?>
                                            </td>
                                            <td> <?php echo $value['tenkhuvuc'] ?></td>
                                            <td> <?php echo $value['name'] ?> </td>
                                            <td> <?php echo $value['tenchu'] ?> </td>
                                            <td> <?php echo $value['sdt'] ?> </td>
                                            

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


        <!-- Bảng Tin tức -->
        <form action="./code/xoa_tintuc.php" method="POST">

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_tintuc">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_tintuc">Tin tức</span> &nbsp; <button
                                    class="btn btn-danger"> Xoá </button> </h4>
                            <div class="table-responsive">
                                <table class="table" id="data_tintuc">
                                    <thead>
                                        <tr>
                                            <th>
                                                <!-- Chọn tất cả -->
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" id="checktintuc"
                                                            onchange="checkAll2(this)" class="form-check-input">
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
                                                        <input type="checkbox" name="del[]" id="checktintuc"
                                                            value="<?php echo $value['id'] ?>" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $key + 1 ?>
                                            </td>
                                            <td> <?php echo $value['tieude'] ?></td>

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
<?php
  include '../include/scripts.php';

  ?>
</body>

</html>

<?php } else {
  echo "<script>alert('Bạn không phải admin bạn cần đăng nhập bằng tài khoản admin để quản trị dữ liệu!')</script>";
}
?>