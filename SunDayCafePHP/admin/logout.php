<?php
// Khởi động phiên
session_start();

// Hủy bỏ tất cả các biến phiên
$_SESSION = array();

// Hủy bỏ phiên
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chính
header("Location: login.php"); // Thay thế 'login.php' bằng URL của trang đăng nhập hoặc trang chính của bạn
exit();
?>
