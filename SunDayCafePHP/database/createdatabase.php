<?php
// Kết nối đến cơ sở dữ liệu
require_once '../database/connect.php';

// Tạo bảng role
$sql_role = "CREATE TABLE IF NOT EXISTS role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

// Tạo bảng user
$sql_user = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES role(id)
)";


// Tạo bảng danh mục sản phẩm
$sql_category = "CREATE TABLE IF NOT EXISTS category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

// Tạo bảng sản phẩm
$sql_product = "CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    category_id INT,
    description TEXT,
    quantity INT,
    price DECIMAL(10, 2),
    is_bestseller TINYINT(1) DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES category(id)
)";

// Tạo bảng đơn hàng
$sql_order = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255) DEFAULT 'Chưa Thanh Toán',
    payment_status VARCHAR(255) DEFAULT 'unpaid', -- Thêm trường payment_status
    FOREIGN KEY (user_id) REFERENCES user(id)
)";

$sql_order_alter = "ALTER TABLE orders MODIFY COLUMN id INT AUTO_INCREMENT";
// Tạo bảng chi tiết đơn hàng
$sql_order_details = "CREATE TABLE IF NOT EXISTS order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
)";
$conn->query($sql_role);
$conn->query($sql_user);
$conn->query($sql_category);
$conn->query($sql_product);
$conn->query($sql_order);
$conn->query($sql_order_alter); 
$conn->query($sql_order_details);
?>
Cơ sở dữ liệu đã được tạo thành công!
