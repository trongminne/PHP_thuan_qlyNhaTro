<?php
include "./sweetalert.php";
?>


<body>
    <!-- Xoá nhiều -->

    <?php

    $del = (isset($_POST['del_nhatro'])) ? $_POST['del_nhatro'] : '';

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
    $qr = mysqli_query($conn, "DELETE FROM nhatro WHERE id_nhatro IN(" . $id . ")");
    if ($qr) {
        // Hiển thị thông báo chèn thành công
        echo '<script>
Swal.fire({
    icon: "success",
    title: "Xoá thành công!",
   

}).then(function() {
    window.location.href = "../index.php";
});
</script>';
    } else {
        // Hiển thị thông báo chèn không thành công
        echo '<script>
Swal.fire({
icon: "error",
title: "Xoá thất bại!",

}).then(function() {
    window.location.href = "../index.php";
});
</script>';
    }
    ?>

</body>