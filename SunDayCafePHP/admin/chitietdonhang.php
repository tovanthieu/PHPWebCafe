<?php
// Kết nối đến cơ sở dữ liệu
require_once '../database/connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có tham số 'id' được truyền vào không
if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
    
    // Truy vấn dữ liệu của đơn hàng và thông tin khách hàng và sản phẩm
    $sql_order_detail = "SELECT orders.id as order_id, orders.total_price, orders.order_date, orders.status, user.username as customer_name, product.name as product_name, order_details.quantity
    FROM orders
    INNER JOIN user ON orders.user_id = user.id
    INNER JOIN order_details ON orders.id = order_details.order_id
    INNER JOIN product ON order_details.product_id = product.id
    WHERE orders.id = $order_id";
    $result_order_detail = $conn->query($sql_order_detail);

    if ($result_order_detail->num_rows > 0) {
        $order = $result_order_detail->fetch_assoc();
    } else {
        echo "Không tìm thấy đơn hàng.";
        exit();
    }
} else {
    echo "Thiếu thông tin đơn hàng.";
    exit();
}
?>

<!-- Tiếp tục với mã HTML của bạn -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Quản lý đơn hàng</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .order-item {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Chi tiết đơn hàng</h1>
                    <!-- Order Information -->
                    <div class="order-item">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Mã đơn hàng:</strong> <?php echo $order['order_id']; ?></p>
                                <p><strong>Giá:</strong> <?php echo $order['total_price']; ?></p>
                                <p><strong>Ngày mua:</strong> <?php echo $order['order_date']; ?></p>
                                <p><strong>Trạng thái:</strong> <?php echo $order['status']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tên khách hàng:</strong> <?php echo $order['customer_name']; ?></p>
                                <p><strong>Tên sản phẩm:</strong> <?php echo $order['product_name']; ?></p>
                                <p><strong>Số lượng:</strong> <?php echo $order['quantity']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Back Button -->
                    <a href="javascript:history.go(-1)" class="btn btn-secondary">Quay lại</a>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
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









