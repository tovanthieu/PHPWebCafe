<?php
require_once 'database/connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
  // Lấy ID của sản phẩm được nhấn vào
  $product_id = $_POST['product_id'];

  // Truy vấn để lấy thông tin chi tiết của sản phẩm từ CSDL
  $sql_product = "SELECT * FROM product WHERE id = $product_id";
  $result_product = $conn->query($sql_product);

  // Kiểm tra xem sản phẩm có tồn tại hay không
if ($result_product && $result_product->num_rows > 0) {
  $row = $result_product->fetch_assoc();
  $quantity = 1; // Define the quantity here
  $product = array(
      'id' => $product_id,
      'name' => $row['name'],
      'price' => $row['price'],
      'quantity' => $quantity,
      'image' => $row['image'], // Thêm thông tin ảnh vào session
      'description' => $row['description'] // Thêm thông tin mô tả vào session
  );
  $_SESSION['cart'][] = $product;
  // Trả về thông báo kết quả
  echo "Thêm sản phẩm vào giỏ hàng thành công!";
} else {
  echo "Không tìm thấy sản phẩm.";
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
	          <li class="nav-item"><a href="menu.php" class="nav-link">Danh Mục</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">Giới Thiệu</a></li>
	          
            </li>

	          <li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span></a></li>
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
            echo '<a class="dropdown-item" href="order_history.php">Xem thông tin mua hàng</a>';
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

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Xin Chào</span>
              <h1 class="mb-4">SunDay Cafe Kính Chào Quý Khách</h1>
              <p class="mb-4 mb-md-5">Chúc Ngon Miệng.</p>
        
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Xin Chào</span>
              <h1 class="mb-4">Hương vị tuyệt vời</h1>
              <p class="mb-4 mb-md-5"></p>
             

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Xin Chào</span>
              <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
              <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              
            </div>

          </div>
        </div>
      </div>
    </section>




	<div class="col-md-12 ftco-animate">
    <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <?php
        // Thực hiện truy vấn để lấy danh sách các danh mục sản phẩm từ CSDL
        $sql_categories = "SELECT * FROM category"; // Giả sử bảng danh mục sản phẩm có tên là "category"
        $result_categories = $conn->query($sql_categories);

        // Kiểm tra và hiển thị từng danh mục
        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                echo '<a class="nav-link" id="v-pills-' . $row_category["id"] . '-tab" data-toggle="pill" href="#v-pills-' . $row_category["id"] . '" role="tab" aria-controls="v-pills-' . $row_category["id"] . '" aria-selected="false">' . $row_category["name"] . '</a>';
            }
        } else {
            echo 'Không có danh mục nào.';
        }
        ?>
    </div>
</div>
<div class="col-md-12">
    <div class="tab-content ftco-animate" id="v-pills-tabContent">
        <?php
        // Thực hiện truy vấn để lấy sản phẩm của danh mục "Cà Phê" (giả sử danh mục này có id là 1)
        $sql_sweet_cakes = "SELECT * FROM product WHERE category_id = 1 LIMIT 3"; 
        $result_sweet_cakes = $conn->query($sql_sweet_cakes);

        // Hiển thị sản phẩm của danh mục "Cà Phê"
        if ($result_sweet_cakes->num_rows > 0) {
            echo '<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">';
            echo '<div class="row">';
            while ($row_product = $result_sweet_cakes->fetch_assoc()) {
                // Hiển thị thông tin sản phẩm


                echo '<div class="col-md-4 text-center">';
				        echo '<div class="menu-wrap">';
                echo '<a href="#" class="menu-img img mb-4" style="background-image: url(anhsanpham/' . $row_product["image"] . ');"></a>'; // Đường dẫn tới thư mục chứa ảnh sản phẩm
                echo '<div class="text">';
                echo '<h3><a href="#">' . $row_product["name"] . '</a></h3>';
                echo '<p>' . $row_product["description"] . '</p>';
                echo '<p class="price"><span>' . $row_product["price"] . '</span></p>';
                echo '<form method="post" action="index.php">'; // Đặt action là index.php để xử lý khi người dùng nhấn nút "Thêm Vào Giỏ Hàng"
                echo '<input type="hidden" name="product_id" value="' . $row_product["id"] . '">'; // Input hidden để chứa ID của sản phẩm
                echo '<p><button type="submit" class="btn btn-primary btn-outline-primary" name="add_to_cart">Thêm Vào Giỏ Hàng</button></p>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Không có sản phẩm nào cho danh mục "Cà Phê".';
        }

        // Thực hiện truy vấn để lấy sản phẩm của danh mục "Bánh ngọt" (giả sử danh mục này có id là 2)
        $sql_savory_cakes = "SELECT * FROM product WHERE category_id = 2 LIMIT 3"; 
        $result_savory_cakes = $conn->query($sql_savory_cakes);

        // Hiển thị sản phẩm của danh mục "Bánh ngọt"
        if ($result_savory_cakes->num_rows > 0) {
            echo '<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">';
            echo '<div class="row">';
            while ($row_product = $result_savory_cakes->fetch_assoc()) {
                // Hiển thị thông tin sản phẩm
                echo '<div class="col-md-4 text-center">';
				echo '<div class="menu-wrap">';
                echo '<a href="#" class="menu-img img mb-4" style="background-image: url(anhsanpham/' . $row_product["image"] . ');"></a>'; // Đường dẫn tới thư mục chứa ảnh sản phẩm
                echo '<div class="text">';
                echo '<h3><a href="#">' . $row_product["name"] . '</a></h3>';
                echo '<p>' . $row_product["description"] . '</p>';
                echo '<p class="price"><span>' . $row_product["price"] . '</span></p>';
                echo '<form method="post" action="index.php">'; // Đặt action là index.php để xử lý khi người dùng nhấn nút "Thêm Vào Giỏ Hàng"
                echo '<input type="hidden" name="product_id" value="' . $row_product["id"] . '">'; // Input hidden để chứa ID của sản phẩm
                echo '<p><button type="submit" class="btn btn-primary btn-outline-primary" name="add_to_cart">Thêm Vào Giỏ Hàng</button></p>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Không có sản phẩm nào cho danh mục "Bánh ngọt.';
        }

		// Thực hiện truy vấn để lấy sản phẩm của danh mục "Bánh mặn" (giả sử danh mục này có id là 3)
        $sql_savory_cakes = "SELECT * FROM product WHERE category_id = 3 LIMIT 3"; 
        $result_savory_cakes = $conn->query($sql_savory_cakes);

        // Hiển thị sản phẩm của danh mục "Bánh mặn"
        if ($result_savory_cakes->num_rows > 0) {
            echo '<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">';
            echo '<div class="row">';
            while ($row_product = $result_savory_cakes->fetch_assoc()) {
                // Hiển thị thông tin sản phẩm
                echo '<div class="col-md-4 text-center">';
				echo '<div class="menu-wrap">';
                echo '<a href="#" class="menu-img img mb-4" style="background-image: url(anhsanpham/' . $row_product["image"] . ');"></a>'; // Đường dẫn tới thư mục chứa ảnh sản phẩm
                echo '<div class="text">';
                echo '<h3><a href="#">' . $row_product["name"] . '</a></h3>';
                echo '<p>' . $row_product["description"] . '</p>';
                echo '<p class="price"><span>' . $row_product["price"] . '</span></p>';
                echo '<form method="post" action="index.php">'; // Đặt action là index.php để xử lý khi người dùng nhấn nút "Thêm Vào Giỏ Hàng"
echo '<input type="hidden" name="product_id" value="' . $row_product["id"] . '">'; // Input hidden để chứa ID của sản phẩm
echo '<p><button type="submit" class="btn btn-primary btn-outline-primary" name="add_to_cart">Thêm Vào Giỏ Hàng</button></p>';
echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Không có sản phẩm nào cho danh mục "Bánh mặn".';
        }
        ?>
		
    </div>
</div>



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
					// Thực hiện truy vấn để lấy danh sách sản phẩm từ CSDL
					$sql = "SELECT * FROM product ORDER BY id DESC LIMIT 33"; // Giả sử bảng sản phẩm có tên là "product"
					$result = $conn->query($sql);

					 // Kiểm tra và hiển thị sản phẩm
            if ($result->num_rows > 0) {
              // Duyệt qua từng hàng dữ liệu
              while ($row = $result->fetch_assoc()) {
                  // Hiển thị thông tin sản phẩm
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo '<a href="#" class="img" style="background-image: url(\'anhsanpham/' . $row["image"] . '\');"></a>';

                  echo '<div class="text text-center pt-4">';
                  echo '<h3><a href="#">' . $row["name"] . '</a></h3>';
                  echo '<p class="price"><span>' . $row["price"] . '</span></p>';
                  echo '<form method="post" action="index.php">'; // Đặt action là index.php để xử lý khi người dùng nhấn nút "Thêm Vào Giỏ Hàng"
                  echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">'; // Input hidden để chứa ID của sản phẩm
                  echo '<p><button type="submit" class="btn btn-primary btn-outline-primary" name="add_to_cart">Thêm Vào Giỏ Hàng</button></p>';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
              }
          } else {
              echo "Không có sản phẩm nào.";
          }
					?>
				</div>
			</div>
		</section>



	
		

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
  <script>
  $(document).ready(function(){
    $('.add-to-cart-btn').click(function(){
      var product_id = $(this).attr('data-product-id');
      $.ajax({
        type: 'POST',
        url: 'add_to_cart.php',
        data: { product_id: product_id },
        success: function(response){
          alert(response); // Hiển thị thông báo kết quả
        }
      });
    });
  });
</script>  
  </body>
</html>

