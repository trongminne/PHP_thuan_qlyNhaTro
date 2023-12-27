<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';
?>

<!-- Số lượng -->

<?php
$id_taikhoan = $_SESSION['id'];


$qr_nhatro = mysqli_query($conn, "SELECT COUNT(*) FROM nhatro WHERE id_taikhoan = '$id_taikhoan'");
$count_nhatro = mysqli_fetch_array($qr_nhatro);

$qr_tintuc = mysqli_query($conn, "SELECT COUNT(*) FROM tintuc WHERE id_taikhoan = '$id_taikhoan'");
$count_tintuc = mysqli_fetch_array($qr_tintuc);
?>

<!-- Xuất bảng -->

<?php
$data_nhatro = mysqli_query(
    $conn,
    "SELECT id_nhatro , tenkhuvuc, name, sdt, price, tiencoc, image FROM khuvuc INNER JOIN nhatro ON khuvuc.id_khuvuc = nhatro.id_khuvuc WHERE id_taikhoan = '$id_taikhoan';"
);

$data_tintuc = mysqli_query($conn, "SELECT * FROM tintuc WHERE id_taikhoan = '$id_taikhoan'");
$data_dat = mysqli_query(
    $conn,
    "SELECT t.*, nt.name, nt.id_nhatro, nt.tiencoc FROM taikhoan t INNER JOIN lichsu_dat ld ON ld.id_taikhoan = t.id INNER JOIN nhatro nt ON nt.id_nhatro = ld.id_nhatro WHERE nt.id_taikhoan = '$id_taikhoan ';"
);
?>


<?php if (isset($_SESSION['quyen']) & $_SESSION['quyen'] == '2') { ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" id="mode_body">
            <div class="row">

                <div class="col-sm-6 grid-margin ">
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
                                    <i class=" mdi mdi-home icon-lg  text-primary ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 grid-margin">
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

            </div>


            <!-- Bảng Nhà Trọ -->
            <form action="./code/xoa_nhatro.php" method="POST">

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_nhatro">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_nhatro">Nhà trọ</span> &nbsp; <button class="btn btn-danger" onclick="return confirmHuyDangKi1()"> Xoá </button>
                                </h4>

                                <script>
                                    function confirmHuyDangKi1() {
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
                                                <th> Tiền thuê </th>
                                                <th> Tiền cọc </th>
                                              
                                                <th> Ảnh </th>
                                                <th>Sửa</th>
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
                                                    <td> <?php echo number_format($value['price'], 0, ',', '.') . ' vnđ'; ?></td>
                                                    <td> <?php echo number_format($value['tiencoc'], 0, ',', '.') . ' vnđ'; ?></td>
                                                   
                                                   
                                                    <td> <img src="./upload/<?php echo $value['image']; ?>" alt=""> </td>
                                                    <td>
                                                        <a href="edit_nhatro.php?id=<?php echo $value['id_nhatro']; ?>" class="btn btn-primary">

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
                                                <th> Ảnh </th>
                                                <th>Sửa</th>
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
                                                    <td><a href="/tintuc/show_tintuc.php?id= <?php echo $value['id']; ?>"> <?php echo $value['tieude']; ?></a></td>

                                                    <td> <img src="./upload/<?php echo $value['image']; ?>" alt=""> </td>
                                                    <td>

                                                        <a href="edit_tintuc.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">

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

            <!-- Bảng Tin tức -->
            <form action="./code/xoa_tintuc.php" method="POST">

                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card" id="mode_table_tintuc">
                            <div class="card-body">
                                <h4 class="card-title"><span id="mode_text_table_tintuc">Đơn đặt phòng</span>
                                </h4>
                                <div class="table-responsive">

                                    <table class="table" id="data_khuvuc">
                                        <thead>
                                            <tr>
                                                
                                                <th> STT </th>
                                                <th> Tên tài khoản </th>
                                                <th> Email </th>
                                                <th> Tên trọ </th>
                                                <th>  </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_dat as $key => $value) { ?>

                                                <tr>
                                                   
                                                    <td>
                                                        <?php echo $key + 1; ?>
                                                    </td>
                                                    <td> <?php echo $value['taikhoan']; ?></td>
                                                    <td> <?php echo $value['email']; ?></td>
                                                <td><a href="/product/product-view.php?id=<?php echo $value['id_nhatro'] ?>"><?php echo $value['name']; ?></a></td>
                                                  <td>+ <?php echo number_format($value['tiencoc'], 0, ',', '.') . ' vnđ'; ?></td>

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
    echo "<script>alert('Bạn không phải chủ trọ bạn cần đăng nhập bằng tài khoản chủ trọ'); window.location.href='./login/login.php';</script>";
}
?>