<?php
require_once 'database.php';
session_start();
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;
// عرض السة جميع المنتجات
$select_product = "SELECT * FROM products_cart";
$result = $conn->query($select_product);
$resource_product = $result->fetch_all(MYSQLI_ASSOC);
$idcount=0;

// حذف المنتج من السلة
if (isset($_GET['delete_cart'])) {
    $id = $_GET['delete_cart'];
    $delete_product = "DELETE FROM products_cart WHERE id = ?";
    $stmt = $conn->prepare($delete_product);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: products_cart.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>سلة المشتريات</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-custom {
    background: #1E3A8A;

    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .navbar-custom .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    transition: color 0.3s;
  }

  .navbar-custom .nav-link:hover {
    color: #ffe082 !important;
  }

  .navbar-brand {
    color: #fff !important;
    font-weight: bold;
    font-size: 1.2rem;
  }

  .navbar-brand i {
    margin-left: 5px;
  }

  .navbar-toggler {
    border: none;
  }
    .section-header {
      background: linear-gradient(135deg, #0d6efd, #20c997);
      color: white;
      padding: 40px;
      border-radius: 10px;
      margin-bottom: 40px;
      text-align: center;
    }

    .section-header h2 {
      font-weight: bold;
      font-size: 2rem;
    }

    .card {
      border: none;
      transition: 0.3s ease-in-out;
      background-color: #ffffff;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: bold;
      color: #343a40;
    }

    .btn-danger {
      width: 100%;
      font-weight: bold;
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 60px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <i class="fa-solid fa-store"></i> متجر الأجهزة
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> الصفحة الرئيسية</a>
        </li>

        <?php if ($role === 'admin'): ?>
          <li class="nav-item">
            <a href="users.php" class="nav-link"><i class="fa-solid fa-users-gear"></i> إدارة المستخدمين</a>
          </li>
        <?php endif; ?>

        <?php if ($user): ?>
          <li class="nav-item">
            <a href="products.php" class="nav-link"><i class="fa-solid fa-boxes-stacked"></i> إدارة المنتجات</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> تسجيل خروج</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="register.php" class="nav-link"><i class="fa-solid fa-user-plus"></i> تسجيل حساب</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link"><i class="fa-solid fa-right-to-bracket"></i> تسجيل دخول</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

  <section id="cart" style="margin-top: 90px;">
    <div class="container section-header">
      <h2>سلة المشتريات</h2>
      <p class="lead">تفقد المنتجات التي قمت بإضافتها وابدأ خطوات الشراء</p>
    </div>
    <div class="container">
      <?php if (empty($resource_product)): ?>
        <div class="alert alert-warning text-center" role="alert">
          لا توجد منتجات في السلة حاليًا.
        </div>
      <?php else: ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          <?php foreach ($resource_product as $product): ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="<?php echo isset($product['image']) ? htmlspecialchars($product['image']) : 'default.jpg'; ?>" class="card-img-top" alt="صورة المنتج">
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                  <a href="products_cart.php?delete_cart=<?php echo $product['id']; ?>" class="btn btn-danger mt-2">
                    <i class="fa-solid fa-trash"></i> حذف المنتج
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
