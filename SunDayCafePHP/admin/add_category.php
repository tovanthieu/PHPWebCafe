<?php

// Kết nối đến cơ sở dữ liệu
require_once '../database/connect.php';
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    // Chuyển hướng người dùng đến trang không có quyền truy cập
    header("Location: unauthorized.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu được gửi từ form
    $name = $_POST['name'];

    // Thực hiện truy vấn để thêm danh mục mới vào cơ sở dữ liệu
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng người dùng về trang category.php
        header("Location: category.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
