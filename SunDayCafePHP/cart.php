<?php
require_once 'database/connect.php';
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Xử lý thêm sản phẩm vào giỏ hàng nếu có dữ liệu được gửi từ form
if (isset($_POST['add_to_cart'])) {
    // Lấy thông tin sản phẩm từ form
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $index = array_search($product_id, array_column($_SESSION['cart'], 'id'));
    if ($index !== false) {
        // Nếu sản phẩm đã tồn tại, tăng số lượng lên
        $_SESSION['cart'][$index]['quantity'] += $quantity;
    } else {
        // Nếu sản phẩm chưa tồn tại, lấy thông tin sản phẩm từ CSDL và thêm vào giỏ hàng
        $sql = "SELECT * FROM product WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = array(
                'id' => $product_id,
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $quantity
            );
            $_SESSION['cart'][] = $product;
        }
    }
}
// Tính toán tổng tiền
$total_price = 0;
foreach ($_SESSION['cart'] as $product) {
    $total_price += $product['price'] * $product['quantity'];
}

// Xử lý cập nhật số lượng sản phẩm nếu có dữ liệu được gửi từ form
if (isset($_POST['update_quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem số lượng có hợp lệ không
    if ($quantity <= 0) {
        // Xóa sản phẩm khỏi giỏ hàng nếu số lượng là 0 hoặc âm
        $index = array_search($product_id, array_column($_SESSION['cart'], 'id'));
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
        }
    } else {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $index = array_search($product_id, array_column($_SESSION['cart'], 'id'));
        if ($index !== false) {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sunday Cafe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item"><a href="menu.html" class="nav-link">Danh Mục</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Giới Thiệu</a></li>
	          
            </li>

	          <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
        } else {
            echo 'Tài khoản';
        }
        ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdown04">
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a class="dropdown-item" href="#">Xem thông tin mua hàng</a>';
            echo '<a class="dropdown-item" href="logout.php">Đăng xuất</a>';
        } else {
            echo '<a class="dropdown-item" href="login.php">Đăng Nhập</a>';
            echo '<a class="dropdown-item" href="register.php">Đăng ký</a>';
        }
        ?>
    </div>
			</ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->
	

    <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
					<div class="col-md-7 heading-section ftco-animate text-center">
						<span class="subheading"></span>
						<h2 class="mb-4">Sản Phẩm</h2>
					</div>
				</div>
				<div class="row">
                <?php
                    // Kiểm tra nếu giỏ hàng không trống
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $product_id => $product) {
                            echo '<div class="product">';
                            echo '<img src="anhsanpham/' . $product['image'] . '" alt="' . $product['name'] . '" style="width: 100px; height: auto;">';

                            echo '<div class="info">';
                            echo '<h3>' . $product['name'] . '</h3>';
                            echo '<p>' . $product['description'] . '</p>';
                            echo '<p>Giá:' . $product['price'] . '</p>';
                            echo '<p>Số lượng: ' . $product['quantity'] . '</p>';
                            // Thêm form cập nhật số lượng sản phẩm
                            echo '<form method="post" action="">';
                            echo '<p>Số lượng: <input type="number" name="quantity" value="' . $product['quantity'] . '" min="1"></p>';
                            echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
                            echo '<input type="hidden" name="update_quantity" value="true">';
                            echo '<input type="submit" value="Cập nhật">';
                            echo '</form>';
                            // Thêm nút "Xóa sản phẩm"
                            echo '<a href="remove_from_cart.php?id=' . $product['id'] . '">Xóa sản phẩm</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>

				</div>
			</div>
		</section>
        <!-- Hiển thị tổng tiền -->
        <div id="total-price">Tổng tiền: <?php echo number_format($total_price, 2); ?></div>
        <a href="checkout.php" class="btn btn-primary">Thanh toán hóa đơn</a>

    <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Giới thiệu</h2>
                    <p>SunDay Cafe By Thiều Tô</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://www.youtube.com/c/ThieuTo"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100093193560707"><span class="icon-facebook"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Liên Hệ</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">68 , Bien Hoa , Dong Nai</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">0961874429</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">tovanthieu2002@GMAIL.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

