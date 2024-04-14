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

    // Truy vấn để lấy thông tin của danh mục dựa trên id
    $sql = "SELECT * FROM category WHERE id = $category_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy danh mục có ID này";
        exit;
    }
} else {
    echo "Không có ID danh mục được truyền vào";
    exit;
}

// Kiểm tra xem dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu được gửi từ form
    $name = $_POST['name'];

    // Thực hiện truy vấn để cập nhật thông tin của danh mục trong cơ sở dữ liệu
    $sql = "UPDATE category SET name='$name' WHERE id=$category_id";

    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng người dùng về trang category.php
        header("Location: category.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh Mục</title>
</head>

<body>
    <h2>Sửa Danh Mục</h2>
    <form action="" method="POST">
        <label for="name">Tên danh mục:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $category['name']; ?>"><br><br>
        <input type="submit" value="Lưu">
    </form>
</body>

</html>

<?php
// Đóng kết nối
$conn->close();
?>
