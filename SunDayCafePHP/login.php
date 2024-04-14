<?php
session_start();

require_once 'database/connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT username, email, id, password FROM user WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Lấy dữ liệu người dùng từ kết quả truy vấn
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role_id'] = $user['role_id'];

            // Chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
            header("Location: index.php");
            exit();
        } else {
            // Đăng nhập không thành công, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Người dùng không tồn tại, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
        header("Location: login.php?error=1");
        exit();
    }
}
// Kiểm tra nếu có biến session 'registration_success' được thiết lập
if (isset($_SESSION['registration_success'])) {
    // Hiển thị thông báo đăng ký thành công
    echo '<div id="register-success-message" class="alert alert-success">Đăng ký thành công! Xin mời đăng nhập.</div>';
    
    // Xóa biến session 'registration_success' sau khi đã sử dụng
    unset($_SESSION['registration_success']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem nút submit là đăng nhập hay đăng ký
    if (isset($_POST["login-submit"])) {
        // Xử lý đăng nhập
    } elseif (isset($_POST["register-submit"])) {
        // Xử lý đăng ký
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
            // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu chưa
            $sql_check_username = "SELECT * FROM user WHERE username=?";
            $stmt_check_username = $conn->prepare($sql_check_username);
            $stmt_check_username->bind_param("s", $username);
            $stmt_check_username->execute();
            $result_username = $stmt_check_username->get_result();

            // Kiểm tra xem địa chỉ email đã tồn tại trong cơ sở dữ liệu chưa
            $sql_check_email = "SELECT * FROM user WHERE email=?";
            $stmt_check_email = $conn->prepare($sql_check_email);
            $stmt_check_email->bind_param("s", $email);
            $stmt_check_email->execute();
            $result_email = $stmt_check_email->get_result();

            // Nếu tên người dùng hoặc địa chỉ email đã tồn tại, hiển thị thông báo lỗi và ngăn người dùng đăng ký
            if ($result_username->num_rows > 0) {
                echo "Tên người dùng đã được sử dụng!";
            } elseif ($result_email->num_rows > 0) {
                echo "Địa chỉ email đã được sử dụng!";
            } else {
                // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu (ví dụ: sử dụng hàm password_hash())
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Thêm tài khoản vào cơ sở dữ liệu với vai trò mặc định là 'user'
                $roleId = 1; // ID của vai trò 'user'
                $sql_insert_user = "INSERT INTO user (username, email, password, role_id) VALUES (?, ?, ?, ?)";
                $stmt_insert_user = $conn->prepare($sql_insert_user);
                $stmt_insert_user->bind_param("sssi", $username, $email, $hashedPassword, $roleId);
                
                if ($stmt_insert_user->execute()) {
                    // Đăng ký thành công, thiết lập biến session và chuyển hướng đến trang đăng nhập
                    $_SESSION['registration_success'] = true;
                    header("Location: login.php");
                    exit();
                } else {
                    // Xử lý lỗi khi thêm tài khoản vào cơ sở dữ liệu
                    echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
                }

                $stmt_insert_user->close();
            }

            $stmt_check_username->close();
            $stmt_check_email->close();
            $conn->close();
        }
    }
}
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Form</title>
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
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Đăng nhập</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Đăng ký</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tài Khoản" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng Nhập">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="index.php" tabindex="5" class="forgot-password">Trang Chủ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="login.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tài Khoản" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật Khẩu">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Nhập Lại Mật Khẩu">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng Ký">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="index.php" tabindex="5" class="forgot-password">Trang Chủ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });
    </script>
</body>
</html>
