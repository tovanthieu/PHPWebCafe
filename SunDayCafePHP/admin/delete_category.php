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
// Kiểm tra xem id danh mục được truyền vào
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Thực hiện truy vấn để xóa danh mục từ cơ sở dữ liệu
    $sql = "DELETE FROM category WHERE id=$category_id";

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
