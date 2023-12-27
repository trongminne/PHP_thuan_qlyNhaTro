<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlynhatro');
if (!$conn)
    echo 'Loi ket noi';
            mysqli_set_charset($conn, "utf8");

