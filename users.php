<?php
session_start();
// الاتصال بقاعدة البيانات 
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "database";
$conn = new mysqli($serverName, $username, $password, $databaseName);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? null;
if (!$user || $role !== 'admin') {
  header("Location: login.php");
  exit();
}

// إضافة مستخدم
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add'])) {
  $name = trim($_POST['name']);
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $role = $_POST['role'];
  $password = $_POST['password'];

  if (!empty($name) && !empty($email) && !empty($password) && !empty($role) && !(strlen($password)<6) ) {// هون مابقون بعملية الادخال وفي حقل فارغ 
    $insert_data = "INSERT INTO users (UserName, email, Password, role) VALUES ('$name', '$email', '$password', '$role')";
    $conn->query($insert_data);
  }
}

if (isset($_GET['delete'])) {
  //هون هم نجيب ال id الخاص بالشخص الي بدنا نحذفه
  $id = $_GET['delete'];
  $delete_user = "DELETE FROM users WHERE id = $id";
  $conn->query($delete_user);
}
//استعلام البيانات من القاعدة بعد الحذف
$sql = "SELECT * FROM users";
$res = $conn->query($sql);
$users = [];
if ($res && $res->num_rows > 0) {
    $users = $res->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>إدارة مستخدمي المتجر</title>
    <style>
        .navbar-custom {
            background: #1E3A8A;

        }
        body {
            background-color: #f8f9fa;
            margin-top: 100px;
        }
        .card {
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
        .form-select, .btn, input.form-control {
            width: 100% !important;
        }

        form > div[style] {
            flex-direction: column !important;
            gap: 10px !important;
        }

        .card {
            padding: 15px !important;
        }

        h2 {
            font-size: 1.2rem;
            text-align: center;
        }

        table thead th, table tbody td {
            font-size: 0.9rem;
            padding: 8px;
        }

        .navbar .nav-link {
            font-size: 0.9rem;
        }
}
    </style>
</head>
<body>
<header style="display: flex; flex-direction: column; gap: 20px;">
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
                <li class="nav-item">
                    <a class="nav-link text-white" href="products.php">
                    <i class="fa-solid fa-box-open"></i> إدارة المنتجات 
                    </a>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i> تسجيل خروج
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div style="background-color: #E3F2FD; padding: 20px; text-align: center; color: blue;">
        <h1>إدارة مستخدمين المتجر</h1>
    </div>
    <h2 style="color: green;">إضافة مستخدم</h2>
</header>

<div class="card p-4 shadow-sm mb-4" style="background: #F5F5F5; border-radius: 20px;">
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" name="name" placeholder="أدخل اسم المستخدم">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" name="email" placeholder="أدخل البريد الإلكتروني">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">كلمة المرور</label>
            <input type="password" class="form-control" name="password" placeholder="أدخل كلمة المرور">
        </div>
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <select name="role" class="form-select">
                <option selected disabled>نوع المستخدم</option>
                <option value="admin">مدير</option>
                <option value="user">مستخدم</option>
            </select>
            <button name="add" class="btn btn-primary" style="width: 10%;"><i class="fas fa-save"></i> إضافة مستخدم</button>
        </div>
    </form>
</div>

<h2 class="text-center text-primary mb-3" style="background-color: #E3F2FD;">قائمة المستخدمين</h2>
<div class="card p-4 shadow-sm" style="border-radius: 20px; background-color: #F5F5F5;">
    <table class="table table-bordered border-primary text-center">
        <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>اسم المستخدم</th>
                <th>ايميل المستخدم</th>
                <th>نوع المستخدم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
          <?php  $idcount=0; ?>
            <?php foreach ($users as $user): ++$idcount  ?>
                <tr>
                    <td><?= $idcount; ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['role']); ?></td>
                    <td>
                        <a href="users.php?delete=<?= $user['id'] ?>" class="btn btn-danger">حذف</a>
                        <a href="updateuser.php?update=<?= $user['id'] ?>" class="btn btn-warning">تعديل</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
