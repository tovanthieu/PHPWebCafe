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
// Kiểm tra nếu không có tham số id hoặc id không hợp lệ, chuyển hướng người dùng điều hướng lại
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: product.php");
    exit();
}

$product_id = $_GET['id'];

// Thực hiện truy vấn để xóa sản phẩm từ cơ sở dữ liệu
$sql_delete = "DELETE FROM product WHERE id = $product_id";

if ($conn->query($sql_delete) === TRUE) {
    echo "Xóa sản phẩm thành công!";
    // Sau khi xóa thành công, chuyển hướng người dùng về trang danh sách sản phẩm
    header("Location: product.php");
    exit();
} else {
    echo "Error: " . $sql_delete . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
