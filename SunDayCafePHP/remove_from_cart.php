<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu giỏ hàng không trống và có id sản phẩm được gửi từ URL
if (!empty($_SESSION['cart']) && isset($_GET['id'])) {
    // Lấy id sản phẩm cần xóa
    $product_id = $_GET['id'];
    
    // Duyệt qua giỏ hàng để tìm và xóa sản phẩm
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

// Chuyển hướng người dùng về trang giỏ hàng sau khi xóa sản phẩm
header("Location: cart.html");
?>
