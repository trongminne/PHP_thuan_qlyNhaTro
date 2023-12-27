<?php 

$conn = mysqli_connect('localhost', 'root', '', 'quanlynhatro');


if(!$conn){

    echo "<script>alert('Lỗi kết nối cơ sở dữ liệu!')</script>";
}
        mysqli_set_charset($conn, "utf8")

?>
