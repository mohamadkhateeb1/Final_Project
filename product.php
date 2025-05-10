<?php
session_start();
require_once 'database_product.php';
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;
//هون بحال كان المستخدم مو مسجل دخول اصلا بوجهه صفحة تسجيل الدخول
//  الي بدو يعرضه اذا مو موجود بيبعته على صفحة الرئيسية id بحال كان مسجل دخول بطلع على ال 
 if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = intval($_GET['id']);
$query = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($query);
$products = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .navbar-custom {
            background: linear-gradient(to right, #28a745, #007bff);
        }
        .navbar-custom {
            background: #1E3A8A;
}
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color:rgb(183, 200, 197);
            font-family: 'Arial', sans-serif;
        }
        .card:hover {
    transform: scale(1.01);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  .btn-outline-primary:hover {
    background-color: #0d6efd;
    color: #fff;
  }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white">
                            <i class="fa-solid fa-house"></i> الرئيسية
                        </a>
                    </li>
                    <?php if ($role === 'admin'): ?>
                    <li class="nav-item">
                        <a href="users.php" class="nav-link text-white">
                            <i class="fa-solid fa-user-gear"></i> إدارة المستخدمين
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if ($user): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i> تسجيل خروج
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="register.php">
                            <i class="fa-solid fa-user-plus"></i> تسجيل حساب
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">
                            <i class="fa-solid fa-right-to-bracket"></i> تسجيل دخول
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
<div class="container my-5 ">
  <div class="row justify-content-center">
    <?php foreach ($products as $product): ?>
      <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow rounded-4 overflow-hidden mb-5"
             style="transition: 0.3s;">
          
          
          <img src="<?= htmlspecialchars($product['image']) ?>"
               alt="<?= htmlspecialchars($product['product_name']) ?>"
               class="w-100 "
               style="height: 280px; object-fit: cover;">

          
          <div class="card-body p-4 bg-white">
            <h4 class="fw-bold text-dark mb-2"><?= htmlspecialchars($product['product_name']) ?></h4>
            <p class="text-muted mb-3" style="font-size: 1rem; line-height: 1.6;">
              <?= htmlspecialchars($product['description']) ?>
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-primary fw-semibold fs-5"><?= htmlspecialchars($product['price']) ?> $</span>
              <a href="index.php"
                 class="btn btn-outline-primary fw-semibold px-4 py-2"
                 style="border-radius: 10px;">
                العودة
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>