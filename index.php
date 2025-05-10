<?php 
require_once 'database_product.php';
session_start();
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;
//الاتصال بقاعدة البيانات
$data="SELECT * FROM products order by id desc";
$result = $conn->query($data);
$products =$result->fetch_all(MYSQLI_ASSOC);
//إضاقة المنتج إلى السلة
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];
    $result1 = "SELECT * FROM products WHERE id = $productId";
    $re=$conn->query($result1);
    $product = mysqli_fetch_array($re, MYSQLI_ASSOC);
    $pro_name = $product['product_name'];
    $pro_price = $product['price'];
    $pro_description = $product['description'];
    $pro_image = $product['image'];
    $pro_section = $product['section'];
    $result = $conn->query("INSERT INTO products_cart (product_name, price, description, image, section) VALUES ('$pro_name', '$pro_price', '$pro_description', '$pro_image', '$pro_section')");
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>موقع لعرض المنتجات</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-custom {
      background:#1E3A8A;

    }
    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #fff !important;
      font-weight: 500;
    }
    .navbar-custom .nav-link:hover {
      color: #ffd700 !important;
    }
    .header-banner {
      background: url('https://images.unsplash.com/photo-1511707171634-5f897ff02aa9') center center / cover no-repeat;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: end;
      color: white;
      text-align: center;
    }

    .header-banner h1 {
      color: #000;
      font-weight: bold;
    }

    .form-select {
      max-width: 200px;
    }

    .card-img-top {
      height: 180px;
      object-fit: cover;
      border-radius: 5px 5px 0 0;
    }

    .card {
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    .carousel-inner {
      background-color: #fff;
      border-radius: 10px;
      padding-top: 15px;
    }

    footer {
      background-color: #343a40;
      padding: 40px 0;
      color: #fff;
    }

    footer a {
      color: #bbb;
      text-decoration: none;
    }

    footer a:hover {
      color: #fff;
    }

    .btn-arrow-up {
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 999;
      background-color: #007bff;
      color: white;
      border-radius: 50%;
      padding: 10px 13px;
    }
  </style>
</head>

<body>

<header class="bg-light mb-5" id="header">
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-store"></i> متجر الأجهزة</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <?php if ($role === 'admin'): ?>
            <li class="nav-item"><a href="users.php" class="nav-link"><i class="fa-solid fa-user-gear"></i> إدارة المستخدمين</a></li>
          <?php endif; ?>
          <?php if ($user): ?>
            <li class="nav-item"><a href="products.php" class="nav-link"><i class="fa-solid fa-box-open"></i> إدارة المنتجات</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> تسجيل خروج</a></li>
          <?php else: ?>
            <li class="nav-item"><a href="register.php" class="nav-link"><i class="fa-solid fa-user-plus"></i> تسجيل حساب</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa-solid fa-right-to-bracket"></i> تسجيل دخول</a></li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="products_cart.php"><i class="fa-solid fa-shopping-cart"></i> عربة التسوق</a>
          </li>
        </ul>
        <select class="form-select text-end ms-3" onchange="location = this.value;">
          <option selected disabled>المزيد</option>
          <option value="#laptop"> laptop</option>
          <option value="#mobile">mobile </option>
        </select>
      </div>
    </div>
  </nav>
  <div class="container-fluid header-banner">
    <div class="pb-5">
      <h1>أجمل الأجهزة وأحدثها حول العالم</h1>
      <a href="#shop" class="btn btn-outline-light btn-lg mt-3">تسوق الآن</a>
    </div>
  </div>
</header>
<body>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php $counter = 0; ?>
    <?php foreach (array_chunk($products, 5) as $productGroup): ?>
      <div class="carousel-item <?php echo $counter === 0 ? 'active' : ''; ?>">
        <div class="container py-4">
          <div class="row justify-content-center g-4">
            <?php foreach ($productGroup as $product): ?>
              <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card h-100 shadow-sm border-0">
                  <img src="<?php echo htmlspecialchars($product['image'] ?? 'default.jpg'); ?>" class="card-img-top" alt="صورة المنتج">
                  <div class="card-body text-center p-2">
                    <h6 class="card-title mb-0"><?php echo htmlspecialchars($product['product_name']); ?></h6>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php $counter++; ?>
    <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<section id="shop" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">منتجاتنا</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($products as $product): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="<?php echo htmlspecialchars($product['image'] ?? 'default.jpg'); ?>" class="card-img-top" alt="Product Image">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
              <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-outline-primary btn-sm w-100 mb-2">عرض التفاصيل</a>
              <a href="index.php?add_to_cart=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-success btn-sm w-100">إضافة إلى السلة</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- قسم لابتوبات -->
 <section id="laptop" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">قسم اللابتوبات</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($products as $product): ?>
        <?php if ($product['section'] === 'laptop'):?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="<?php echo htmlspecialchars($product['image'] ?? 'default.jpg'); ?>" class="card-img-top" alt="Product Image">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
              <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-outline-primary btn-sm w-100 mb-2">عرض التفاصيل</a>
              <a href="index.php?add_to_cart=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-success btn-sm w-100">إضافة إلى السلة</a>
            </div>
          </div>
        </div>
        <?php endif;?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- قسم الجوالات -->

 <section id="mobile" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">قسم الموبايلات</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($products as $product): ?>
        <?php if ($product['section'] === 'mobile'):?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="<?php echo htmlspecialchars($product['image'] ?? 'default.jpg'); ?>" class="card-img-top" alt="Product Image">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
              <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-outline-primary btn-sm w-100 mb-2">عرض التفاصيل</a>
              <a href="index.php?add_to_cart=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-success btn-sm w-100">إضافة إلى السلة</a>
            </div>
          </div>
        </div>
        <?php endif;?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<a href="#header" class="btn-arrow-up"><i class="fas fa-arrow-up"></i></a>
<footer class="text-white mt-5">
  <div class="container p-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5 class="text-uppercase">عن الموقع</h5>
        <p>هذا الموقع هو متجر إلكتروني يعرض أحدث الأجهزة والتقنيات. نسعى لتقديم أفضل المنتجات بأفضل الأسعار.</p>
      </div>
      <div class="col-md-6 mb-3">
        <h5 class="text-uppercase">تابعنا</h5>
        <ul class="list-unstyled">
          <li><a href="https://www.facebook.com/share/1HscQEy87R/" target="_blank"><i class="fab fa-facebook me-2"></i>فيسبوك</a></li>
          <li><a href="https://wa.me/905396606443" target="_blank"><i class="fab fa-whatsapp me-2"></i>واتساب</a></li>
          <li><a href="https://www.instagram.com/adel1010_elmlhem" target="_blank"><i class="fab fa-instagram me-2"></i>إنستغرام</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
