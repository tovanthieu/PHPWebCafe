<?php
$servername = "localhost";
$username = "root";
$password = "";
$database  = "sundaycafe";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tạo cơ sở dữ liệu
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Lỗi khi tạo cơ sở dữ liệu: " . $conn->error;
}

// Chọn cơ sở dữ liệu mới được tạo
$conn->select_db($database);

?>
