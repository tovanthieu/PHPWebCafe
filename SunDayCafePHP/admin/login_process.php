<?php
session_start();

// Kết nối đến cơ sở dữ liệu
require_once '../database/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT id, role_id FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lưu thông tin đăng nhập vào session
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role_id'] = $row['role_id'];

        // Chuyển hướng đến trang admin sau khi đăng nhập thành công
        header("Location: index.php");
    } else {
        // Đăng nhập không thành công, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
        header("Location: login.php?error=1");
    }
}
?>
