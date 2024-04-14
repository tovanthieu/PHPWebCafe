<?php
session_start();
// Xóa tất cả các session
session_unset();
// Hủy bỏ session
session_destroy();
// Chuyển hướng người dùng đến trang index.php hoặc trang đăng nhập
header("Location: index.php"); // Thay thế index.php bằng trang mặc định hoặc trang đăng nhập của bạn
exit;
?>
