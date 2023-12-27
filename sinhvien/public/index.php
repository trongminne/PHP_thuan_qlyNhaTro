<?php

include '../include/header.php';
include '../include/navbar.php';
include '../include/connect.php';
?>

<!-- Số lượng -->

<?php
$id_taikhoan = $_SESSION['id'];

?>

<!-- Xuất bảng -->

<?php
$data_dat = mysqli_query(
    $conn,
    "SELECT nhatro.name, nhatro.sdt, nhatro.diachi, nhatro.tenchu, nhatro.id_nhatro
    FROM nhatro
    INNER JOIN lichsu_dat ON lichsu_dat.id_nhatro = nhatro.id_nhatro
    WHERE lichsu_dat.id_taikhoan = '23';
    "
);

$data_nap = mysqli_query($conn, "SELECT * FROM lichsu_nap WHERE id_taikhoan = '$id_taikhoan'");

?>




<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" id="mode_body">


        <!-- Bảng Nhà Trọ -->
        <form action="./code/xoa_nhatro.php" method="POST">

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_nhatro">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_nhatro">Bạn đã đặt những nhà trọ</span> &nbsp; </h4>
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
                                            <th> Tên trọ </th>
                                            <th> Tên chủ </th>
                                            <th> Số điện thoại </th>
                                            <th> Địa chỉ </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_dat as $key => $value) { ?>

                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="del_nhatro[]" id="checknhatro" value="<?php echo $value['id_nhatro']; ?>" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </td>
                                               
                                                <td> <?php echo $key + 1; ?> </td>
                                                <td>
                                                <a href="/product/product-view.php?id=<?php echo $value['id_nhatro']; ?>"><?php echo $value['name']; ?></a>
                                                </td>
                                                <td> <?php echo $value['tenchu']; ?> </td>
                                                <td> <?php echo $value['sdt']; ?> </td>
                                                <td> <?php echo $value['diachi']; ?> </td>
                                                

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



        <form action="./code/xoa_tintuc.php" method="POST">

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card" id="mode_table_tintuc">
                        <div class="card-body">
                            <h4 class="card-title"><span id="mode_text_table_tintuc">Lịch sử nạp tiền</span> </h4>
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
                                            <th> Số tiền </th>
                                            <th> Trạng thái </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_nap as $key => $value) { ?>

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
                                                <td> <?php echo number_format($value['sotien'], 0, ',', '.'). ' đ'; ?></td>
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