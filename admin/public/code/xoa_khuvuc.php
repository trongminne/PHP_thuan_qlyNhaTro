<?php
include "./sweetalert.php";
?>


<!-- Xoá nhiều -->

<body>
    <?php

    $del = (isset($_POST['del_khuvuc'])) ? $_POST['del_khuvuc'] : '';

    $id = "";
    $count = 1;
    foreach ($del as $key => $value) {
        if ($count < sizeof($del)) {
            $id = $id . $value . ',';
        } else {
            $id = $id . $value;
        }
        $count++;
    }
    try {
        $qr = mysqli_query($conn, "DELETE FROM khuvuc WHERE id_khuvuc = " . $id);
        if ($qr) {
            // Hiển thị thông báo xoá thành công
            echo '<script>
    Swal.fire({
        icon: "success",
        title: "Xoá thành công!",
    
    }).then(function() {
        window.location.href = "../index.php";
    });
    </script>';
        } else {
            // Hiển thị thông báo xoá không thành công
            echo '<script>
    Swal.fire({
        icon: "error",
        title: "Xoá thất bại!",
    
    }).then(function() {
        window.location.href = "../index.php";
    });
    </script>';
        }
    } catch (mysqli_sql_exception $e) {
        // Hiển thị thông báo lỗi
        echo '<script>
    Swal.fire({
        icon: "error",
        title: "Không thể xoá khoá ngoại!",
        text: "Đã có nhà trọ liên kết với khu vực này!",
    
    }).then(function() {
        window.location.href = "../index.php";
    });
    </script>';
    }


    ?>
</body>