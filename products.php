<?php
require_once 'database_product.php';
session_start();
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;
if (!$user) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['uoladProduct'])) {
    $name = trim($_POST['productName']);
    $description = trim($_POST['description']);
    $priceProduct=trim($_POST['productPrice']);
    $section = $_POST['section'];
    $imageProduct = $_FILES['productImage'];
    $image_location = $_FILES['productImage']['tmp_name'];
    $image_name= $_FILES['productImage']['name'];
    $image_up="imege/".$image_name;
    if (move_uploaded_file($image_location, $image_up)) {
        $insert_data = "INSERT INTO products (product_name, price, description, image , section) VALUES ('$name', '$priceProduct', '$description', '$image_up' , '$section')";
        $ee=$conn->query($insert_data);
        echo "<script>alert('\u062A\u0645 \u0631\u0641\u0639 \u0627\u0644\u0645\u0646\u062A\u062C \u0628\u0646\u062C\u0627\u062D');</script>";
        header("Location: products.php");
    } else {
        echo "<script>alert('\u0641\u0634\u0644 \u0641\u064A \u0631\u0641\u0639 \u0627\u0644\u0645\u0646\u062A\u062C');</script>";
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_product = "DELETE FROM products WHERE id = $id";
    $conn->query($delete_product);
    header("Location: products.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            margin-top: 100px;
            background-color: #E3F2FD;
        }
        .navbar-custom {
            background: #1E3A8A;

        }
        .product-form {
            max-width: 100%;
            width: 100%;
        }
        .card {
            width: 100%;
        }
        @media (min-width: 768px) {
            .product-form {
                width: 24rem;
            }
        }
        .table-responsive {
            overflow-x: auto;
        }
        td, th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5 d-flex justify-content-center mb-5">
    <div class="card product-form bg-primary text-white">
        <div class="card-body">
            <img src="imege/logo.png" class="card-img-top" alt="صورة المنتج">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">اسم المنتج</label>
                    <input type="text" name="productName" class="form-control" id="productName" placeholder="أدخل اسم المنتج">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <input type="text" name="description" class="form-control" placeholder="وصف المنتج ">
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">السعر</label>
                    <input type="text" name="productPrice" class="form-control" id="productPrice" placeholder="أدخل السعر">
                </div>
                <div class="mb-3">
                    <label for="section" class="form-label">القسم</label>
                    <select name="section" class="form-select" id="section">
                        <option value="" disabled selected>اختر القسم</option>
                        <option name="mobile">mobile </option>
                        <option name="laptop">laptop</option>
                    </select>  
                 </div>
                <div class="mb-3">
                    <input type="file" name="productImage" class="form-control" id="productImage">
                    <label for="productImage" class="form-label">صورة المنتج</label>
                </div>
                <div class="d-flex flex-column flex-md-row gap-2">
                    <button type="submit" name="uoladProduct" class="btn btn-success w-100">
                        <i class="fa-solid fa-upload"></i> رفع المنتج
                    </button>
                    <button type="reset" class="btn btn-danger w-100">❌ إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="bg-primary text-white text-center py-3">
        <h1>عرض المنتجات</h1>
    </div>
</div>
<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th>رقم المنتج</th>
                    <th>اسم المنتج</th>
                    <th>السعر</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>القسم</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $select_product = "SELECT * FROM products";
                $result = $conn->query($select_product);
                $resource_product = $result->fetch_all(MYSQLI_ASSOC);
                $idcount=0; 
                foreach ($resource_product as $row): ++$idcount;
                ?>
                <tr>
                    <td><?php echo $idcount; ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td class="fw-bold text-success"><?= htmlspecialchars($row['price']) ?>$</td>
                    <td class="text-muted"><?= htmlspecialchars($row['description']); ?></td>
                    <td><img src="<?= htmlspecialchars($row['image']); ?>" alt="صورة المنتج" class="img-fluid rounded" style="max-width: 100px;"></td>
                    <td><?= htmlspecialchars($row['section']); ?></td>
                    <td>
                        <a href="products.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i> حذف
                        </a>
                        <a href="UpdateProduct.php?update=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-edit"></i> تعديل
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
