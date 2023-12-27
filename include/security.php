<?php
if (!isset($_SESSION)) {
    @ob_start();
    session_start();
}
if (!isset($_SESSION['taikhoan'])) {
    header('Location: ');
}
?>

