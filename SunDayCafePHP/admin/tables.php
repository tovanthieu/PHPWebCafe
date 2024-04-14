<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'sundaycafe');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 2) {
    // Chuyển hướng người dùng đến trang không có quyền truy cập
    header("Location: unauthorized.php");
    exit();
}

// Truy vấn dữ liệu từ bảng đơn hàng
$sql_orders = "SELECT * FROM orders";
$result_orders = $conn->query($sql_orders);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Quản lý đơn hàng</title>
`
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .order-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Khoảng cách giữa các mục */
        }

        .order-item {
            flex: 0 0 calc(33.33% - 20px); /* Chiều rộng của mỗi mục */
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        
                <div class="sidebar-brand-text mx-3">SunDay Cafe </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lý đơn hàng</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                
                        <a class="collapse-item" href="category.php">Danh mục sản phẩm</a>
                        <a class="collapse-item" href="product.php">Sản phẩm</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

                        <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Đăng Xuất</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <div id="wrapper">
        <!-- Sidebar -->
        <!-- Your sidebar code here -->
        <div class="content">
            <h1 class="mb-4">Quản lý đơn hàng</h1>
            <div class="order-list">
                <?php if ($result_orders->num_rows > 0) : ?>
                    <?php while ($row = $result_orders->fetch_assoc()) : ?>
                        <div class="order-item">
                            <h5>Mã đơn hàng: <?php echo $row['id']; ?></h5>
                            <p>Giá: <?php echo $row['total_price']; ?></p>
                            <p>Ngày mua: <?php echo $row['order_date']; ?></p>
                            <p>Trạng thái: <?php echo $row['status']; ?></p>
                     
                              <a href="chitietdonhang.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Chi tiết đơn hàng</a>
                            <form method="post" action="update_order_status.php">
                                <!-- Thêm một input ẩn để lưu ID của đơn hàng -->
                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                <!-- Nút xác nhận để chuyển trạng thái của đơn hàng -->
                                <button type="submit" name="update_status" class="btn btn-success status-btn">Chuyển sang đã thanh toán</button>
                            </form>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Không có đơn hàng nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>




    
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>









