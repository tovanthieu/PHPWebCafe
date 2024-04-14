<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    // Chuyển hướng người dùng đến trang không có quyền truy cập
    header("Location: unauthorized.php");
    exit();
}

// Kiểm tra xem yêu cầu POST có tồn tại không
if (isset($_POST['update_status'])) {
    // Lấy ID của đơn hàng từ form
    $order_id = $_POST['order_id'];

    // Kết nối đến cơ sở dữ liệu
    require_once '../database/connect.php';

    // Cập nhật trạng thái của đơn hàng trong cơ sở dữ liệu
    $sql_update_status = "UPDATE orders SET status = 'Đã thanh toán' WHERE id = $order_id";
    if ($conn->query($sql_update_status) === TRUE) {
        // Chuyển hướng lại trang
        header("Location: tables.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật trạng thái đơn hàng: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
