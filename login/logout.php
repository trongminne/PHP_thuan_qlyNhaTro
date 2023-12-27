<?php
session_start();
if (isset($_POST['logout_btn']) || isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['taikhoan']);
    header('Location: login.php');
}
