<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register-submit"])) {
    require_once 'database/connect.php'; // Kết nối đến cơ sở dữ liệu

    // Kiểm tra dữ liệu được gửi từ form đăng ký
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Kiểm tra tính hợp lệ của dữ liệu (ví dụ: xác nhận mật khẩu)
    if ($password !== $confirmPassword) {
        // Xử lý lỗi mật khẩu không khớp
        echo "Mật khẩu không khớp!";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu (ví dụ: sử dụng hàm password_hash())
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thêm tài khoản vào cơ sở dữ liệu với vai trò mặc định là 'user'
        $roleId = 1; // ID của vai trò 'user'
        $sql = "INSERT INTO user (username, email, password, role_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $hashedPassword, $roleId);
        
        if ($stmt->execute()) {
            // Đăng ký thành công, chuyển hướng người dùng đến trang đăng nhập hoặc hiển thị thông báo thành công
            header("Location: login.php");
            exit();
        } else {
            // Xử lý lỗi khi thêm tài khoản vào cơ sở dữ liệu
            echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/login.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-register">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng ký</h3>
                    </div>
                    <div class="panel-body">
                        <form id="register-form" action="register.php" method="post" role="form">
                            <div class="form-group">
                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tài khoản" value="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng ký">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
